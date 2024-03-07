<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Home extends Component
{
    use WithPagination, WithFileUploads;

    public $id, $nama, $judul, $kategori, $pertanyaan, $gambar;   

    public $filter = [];     

    public function save()
    {
        $this->validate([
            'nama' => 'required|max:100',
            'kategori' => 'required',
            'pertanyaan' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg|nullable|max:2048'
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
        $this->reset();
        $this->dispatch('success', 'Pertanyaan berhasil di Post.');
        $this->dispatch('modal-create-close');
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
