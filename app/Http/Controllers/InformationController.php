<?php

namespace App\Http\Controllers;
use App\Models\Informations;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Informations::all();
            
        return view('client.recipe', compact('informations'));    }
}
