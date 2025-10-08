<?php

namespace App\Livewire\Lsfbgo;

use Livewire\Component;
use App\Models\Question;
use App\Models\VideoTheme;
use App\Models\Syllabu;

class Questions extends Component
{
    public $questions;
    public $question_id;
    public $video_id;
    public $syllabu_id;
    public $question_text;
    public $type = 'choice';
    public $options = [];
    public $answer;

    public $isEdit = false;

    protected $rules = [
        'video_id' => 'nullable|exists:video_themes_cloudinary,id',
        'syllabu_id' => 'nullable|exists:syllabus,id',
        'question_text' => 'required|string|max:255',
        'type' => 'required|in:choice,text,video-choice,yes-no',
        'answer' => 'required|string|max:255',
        'options' => 'nullable|array',
    ];

    public function mount()
    {
        $this->loadQuestions();
    }

    public function loadQuestions()
    {
        $this->questions = Question::with(['video', 'syllabus'])->latest()->get();
    }

    public function save()
    {
        $this->validate();

        Question::updateOrCreate(
            ['id' => $this->question_id],
            [
                'video_id' => $this->video_id,
                'syllabu_id' => $this->syllabu_id,
                'question_text' => $this->question_text,
                'type' => $this->type,
                'options' => json_encode($this->options),
                'answer' => $this->answer,
            ]
        );

        session()->flash('message', $this->isEdit ? '✅ Pregunta actualizada' : '✅ Pregunta creada');

        $this->resetForm();
        $this->loadQuestions();
    }

    public function edit($id)
    {
        $this->isEdit = true;

        $q = Question::findOrFail($id);

        $this->question_id = $q->id;
        $this->video_id = $q->video_id;
        $this->syllabu_id = $q->syllabu_id;
        $this->question_text = $q->question_text;
        $this->type = $q->type;
        $this->options = $q->options ? json_decode($q->options, true) : [];
        $this->answer = $q->answer;
    }

    public function delete($id)
    {
        Question::findOrFail($id)->delete();
        session()->flash('message', '🗑️ Pregunta eliminada');
        $this->loadQuestions();
    }

    public function resetForm()
    {
        $this->reset(['question_id', 'video_id', 'syllabu_id', 'question_text', 'type', 'options', 'answer', 'isEdit']);
        $this->reset(['question_id', 'video_id', 'syllabu_id', 'question_text', 'type', 'options', 'answer', 'isEdit']);
    }

    public function render()
    {
        return view('livewire.lsfbgo.questions', [
            'videos' => VideoTheme::all(),
            'syllabus' => Syllabu::all(),
        ]);
    }
}
