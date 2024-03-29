<?php

namespace App\Livewire;

use App\Models\Question as Quest;
use App\Models\Answer;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class Question extends Component
{
    public $id, $jawaban;

    public $id_jawaban;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function acceptConfirm($id)
    {
        $this->id = $id;
    }

    public function accept()
    {
        Quest::where('id', $this->id)->update([
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
        Quest::where('id', $this->id)->update([
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
        Quest::where('id', $this->id)->delete();
        $this->dispatch('success', 'Pertanyaan berhasil di hapus.');
        $this->dispatch('modal-delete-close');
    }   

    public function update($id)
    {
        try {
            $this->validate([
                'jawaban' => 'required'
            ], [
                'jawaban.required' => 'Form jawaban belum kamu isi!'
            ]);
           Answer::where('id', $id)->update([
                'answer' => $this->jawaban
            ]);                
            $this->dispatch('create');
        } catch (\Exception $e) {
            $this->dispatch('error', $e->getMessage());
        }  
    }

    public function save()
    {
        try {
            $this->validate([
                'jawaban' => 'required'
            ], [
                'jawaban.required' => 'Form jawaban belum kamu isi!'
            ]);
            $question = Quest::find($this->id);
            switch ($question->category->name) {
                case('Kebidanan & Kandungan') :
                    $doctor_id = 1;
                    break;
                case('Anak') :
                    $doctor_id = 2; 
                    break;  
                case('Umum') :
                    $doctor_id = 4; 
                    break; 
                case('Kecantikan') :
                    $doctor_id = 3;
                    break;  
                default :                   
            } 
            $answer = Answer::create([
                'doctor_id' => $doctor_id,
                'answer' => $this->jawaban
            ]);             
            $question->update([
                'answered' => 1,
                'status' => 'active'
            ]);
            $question->answers()->attach($answer);
            $this->jawaban = '';        
            $this->dispatch('create');
        } catch (\Exception $e) {
            $this->dispatch('error', $e->getMessage());
        }        
    }

    public function render()
    {   
        $question = Quest::where('id', $this->id)->first();
        return view('livewire.question', [
            'question' => $question,
            'answer' => $question->answers->first()
        ]);
    }
}
