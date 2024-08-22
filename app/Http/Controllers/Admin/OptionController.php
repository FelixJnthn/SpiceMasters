<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Question;

class OptionController extends Controller
{
   
    public function index()
    {
        $options = Option::all();

        return view('admin.options.index', compact('options'));
    }

    public function create()
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.options.create', compact('questions'));
    }

    public function store(OptionRequest $request)
    {
        Option::create($request->validated());

        return redirect()->route('admin.options.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show()
    {
    }

    public function edit(Option $option)
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.options.edit', compact('option', 'questions'));
    }

    public function update(OptionRequest $request, Option $option)
    {
        $option->update($request->validated());

        return redirect()->route('admin.options.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Option $option)
    {
        $option->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

}
