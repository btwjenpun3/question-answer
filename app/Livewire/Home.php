<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\map;

class Home extends Component
{
    use WithPagination, WithFileUploads;

    public $id, $nama, $judul, $kategori, $pertanyaan, $gambar;   

    public $filter = [];    
    
    public $recaptchaToken;

    public $recaptchaValid = false;    

    public function save()
    {        
        $response = Http::post(
            'https://www.google.com/recaptcha/api/siteverify?secret=' . env('RECAPTCHA_SECRET_KEY') . '&response=' . $this->recaptchaToken
        );
        $success = $response->json()['success'];
        if (! $success) {
            $this->dispatch('error', 'Kami berpikir kamu adalah robot, harap refresh dan ulangi lagi!');
        } else {
            $this->validate([
                'nama' => 'required|max:100',
                'judul' => 'required',
                'kategori' => 'required',
                'pertanyaan' => 'required',
                'gambar' => 'mimes:png,jpg,jpeg|nullable|max:2048',
            ]);                      
            if ($this->gambar) {
                $gambar = $this->gambar->store('public');
            } else {
                $gambar = null;
            } 
            Question::create([
                'name' => $this->nama,
                'title' => $this->judul,
                'question' => $this->pertanyaan,
                'category_id' => $this->kategori,
                'image' => $gambar,
                'answered' => 0,
                'status' => 'hold'
            ]);
            $response = Http::post('https://api.telegram.org/bot' . env('TELEGRAM_TOKEN') . '/sendMessage', [
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => 'Ada Pertanyaan Baru\!
                
*Nama : *' . $this->nama . '
*Kategori : *' . $this->kategori . '
*Pertanyaan : *' . $this->pertanyaan,
                'parse_mode' => 'MarkdownV2'
            ]);
            $this->reset();
            $this->dispatch('success', 'Pertanyaan berhasil di Post. Pertanyaan kamu akan muncul beberapa saat setelah kami melakukan pengecekan.');
            $this->dispatch('modal-create-close');
        }                    
    }    

    public function acceptConfirm($id)
    {
        $this->id = $id;
    }

    public function accept()
    {
        Question::where('id', $this->id)->update([
            'status' => 'active'
        ]);
        $this->dispatch('success', 'Pertanyaan berhasil di setujui.');
        $this->dispatch('modal-accept-close');
    }

    public function archiveConfirm($id)
    {
        $this->id = $id;
    }
    
    public function archive()
    {
        Question::where('id', $this->id)->update([
            'status' => 'archive'
        ]);
        $this->dispatch('success', 'Pertanyaan berhasil di arsipkan.');
        $this->dispatch('modal-archive-close');
    }

    public function deleteConfirm($id)
    {
        $this->id = $id;
    }

    public function delete()
    {
        Question::where('id', $this->id)->delete();
        $this->dispatch('success', 'Pertanyaan berhasil di hapus.');
        $this->dispatch('modal-delete-close');
    }   

    public function render()
    {                
        return view('livewire.home', [
            'questions' => Question::when(!empty(array_filter($this->filter)), function ($query) {
                return $query->whereIn('category_id', array_filter($this->filter));
            })->orderBy('id','desc')->cursorPaginate(10),           
        ]);
    }
}
