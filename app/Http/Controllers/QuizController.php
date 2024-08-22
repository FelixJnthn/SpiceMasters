<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Difficulty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function store(StoreQuizRequest $request)
     {
        //'questions' dari form di view
        // mengambil opsi jawaban dari database yang sesuai dengan input yang dijawab user
         $options = Option::find(array_values($request->input('questions')));
 
         //membuat userResults dari point dari options yang user jawab
         //menjumlah point dr option yang user jawab
         $result = auth()->user()->userResults()->create([
             'total_points' => $options->sum('points')
         ]);

         //untuk menympan data dari jawaban yang dipilih user
         $questions = $options->mapWithKeys(function ($option) {
            //ambil question_id dari option yang dipilih
             return [$option->question_id => [
                        //untuk Result, dijelasin option_id dari id option, points dari points di table options
                         'option_id' => $option->id,
                         'points' => $option->points
                     ]
                 ];
             })->toArray();
        
        //manggil relasi questions dimodel result diisi data yang baru dari $questions diatas
        //data diatas semua disimpan di $result (tabel pivot)
         $result->questions()->sync($questions);

        //client.results.show di router, ke ResultController
         return redirect()->route('client.results.show', $result->id);
     }
     
    public function quizeasy()
    {
        //manggil function difficultyQuestions dari model difficulty ngeget questions dengan difficulty itu
        //questionOptions dari model questions karena question has many options
        $difficulties = Difficulty::with(['difficultyQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
        ->whereHas('difficultyQuestions', function ($query) {
            $query->where('name', 'easy');
        })
        ->get();
    
        return view('client.quizeasy', compact('difficulties'));
    }
    
    public function quizmedium()
    {
        $difficulties = Difficulty::with(['difficultyQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
        ->whereHas('difficultyQuestions', function ($query) {
            $query->where('name', 'medium');
        })
        ->get();
    
        return view('client.quizmedium', compact('difficulties'));
    }
    
    public function quizhard()
    {
        $difficulties = Difficulty::with(['difficultyQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
        ->whereHas('difficultyQuestions', function ($query) {
            $query->where('name', 'hard');
        })
        ->get();
    
        return view('client.quizhard', compact('difficulties'));
    }
    



}
