<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;
use App\Models\Difficulty;

class QuestionController extends Controller
{
   
    public function index()
    {
        $questions = Question::all();

        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        //ngeget data difficulty untuk tampil diform, pluck buat nampilin nama difficulty
        $difficulties = Difficulty::all()->pluck('name', 'id');

        return view('admin.questions.create', compact('difficulties'));
    }

    public function store(QuestionRequest $request)
    {
        Question::create($request->validated());

        return redirect()->route('admin.questions.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Question $question)
    {
        $questions = Question::all();
        $difficulties = Difficulty::all()->pluck('name', 'id');

        return view('admin.questions.show', compact('question', 'difficulties'));
    }

    public function edit(Question $question)
    {
        $difficulties = Difficulty::all()->pluck('name', 'id');

        //compact itu variabel diview buat ditampilin
        return view('admin.questions.edit', compact('question', 'difficulties'));
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return redirect()->route('admin.questions.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Question $question)
    {
        $question->questionOptions()->delete();
        $question->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

}
