<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use App\Models\Question;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
   
    public function index()
    {
        $results = Result::all();

        return view('admin.results.index', compact('results'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show(Result $result)
    {
        return view('admin.results.show', compact('result'));
    }

    public function edit(Result $result)
    {

    }

    public function update()
    {

    }

    public function destroy(Result $result)
    {
        $result->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

}
