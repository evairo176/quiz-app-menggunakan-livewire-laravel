<?php

namespace App\Http\Livewire;

use App\Models\tb_question;
use App\Models\User;
use Livewire\Component;

class Quiz extends Component
{
    public $status;
    public $question;
    public $priority;
    public $total_question;
    public $my_selected;
    public $correct;
    public $jawaban_user = [];
    public $priority_user = [];
    public $user;
    public $allquestion;

    public function mount()
    {
        $this->status = 'instruction';
        $this->priority = 1;
        $this->total_question = tb_question::count();
        $this->correct = 0;
        $this->my_selected = null;
        // dd($this->priority_user);
    }
    public function changeStatus($status)
    {
        $this->status = $status;
    }
    public function chooseOption($index)
    {
        $this->my_selected = $index;
    }
    public function changePriority($index)
    {
        $this->priority = $index;
    }
    public function render()
    {
        $this->question = tb_question::where('priority', $this->priority)->first();
        $this->allquestion = tb_question::all();
        $this->user = User::where('id', '1')->first();
        return view('livewire.quiz');
    }

    public function nextQuestion()
    {
        // $this->priority_user = $this->priority;
        array_push($this->priority_user, $this->priority);
        array_push($this->jawaban_user, $this->my_selected);
        if ($this->my_selected == $this->question->correct) {
            $this->correct++;
        }
        if ($this->priority < $this->total_question) {
            $this->priority++;
            $this->my_selected = null;

            // $qjawaban = 0;

            $data = [
                'answer' => $this->jawaban_user,
                'priority' => $this->priority_user,
                'score_quiz' => ($this->correct * 100) / $this->total_question,
                'total_correct' => $this->correct,
            ];
            User::where('id', '1')->update($data);
        } else {
            // foreach ($this->priority_user as $index => $prt) {
            // dd($index);
            // $data = [
            //     'answer' => $this->jawaban_user,
            //     'priority' => $this->priority_user,
            //     'score_quiz' => ($this->correct * 100) / $this->total_question,
            //     'total_correct' => $this->correct,
            // ];
            // User::where('id', '1')->update($data);
            // }
            $this->status = 'finish';
        }
    }
}
