<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function show($result_id){
        //result belongsto user
        //wherehas untuk memastikan $result ditampilkan ke user yang sedang login saja
        $result = Result::whereHas('user', function ($query) {
            $query->whereId(auth()->id());
            //mencari hasil kuis dengan ID yang sesuai, jika tidak sesuai error
        })->findOrFail($result_id);
    
        return view('client.results', compact('result'));
    }
}
