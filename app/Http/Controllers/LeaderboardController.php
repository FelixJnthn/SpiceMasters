<?php

namespace App\Http\Controllers;
use App\Models\Result;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $results = Result::all();

        return view('client.leaderboard', compact('results'));
    }
}
