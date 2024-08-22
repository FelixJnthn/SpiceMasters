<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Result;

class DashboardController extends Controller
{
    public function index(){
        $totalUsers = User::count();
        //gabungan tabel results dan user, disamain user id, dan user id diresult
        $topScoreUser = User::join('results', 'users.id', '=', 'results.user_id')
        ->orderByDesc('results.total_points')
        ->select('users.*', 'results.*')
        ->first();
    

        $totalSubmitted = Result::count();
        $totalRecipe = Informations::count();


        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalSubmitted' => $totalSubmitted,
            'topScoreUser' => $topScoreUser,
            'totalRecipe' => $totalRecipe
        ]);
    }
}
