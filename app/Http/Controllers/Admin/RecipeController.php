<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Info;
use Illuminate\Contracts\View\View;

use App\Http\Requests\Admin\RecipeRequest;

use App\Models\Informations;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $informations = Informations::all();
            
        return view('admin.recipes.index', compact('informations'));
    }
    

    public function create()
    {
        return view('admin.recipes.create');
    }

    public function store(Request $request)
    {
        Informations::create([
            'recipe_name' => $request->recipe_name,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,

    ]);

        return redirect()->route('admin.recipe.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }


    public function show($id)
    {
        $info = Informations::findOrFail($id);
            
        return view('admin.recipes.show', compact('info'));
    }
    

    public function edit($id)
    {

        return view('admin.recipes.edit', [
            'info'=>Informations::findOrFail($id)
        ]);

    }

    public function update(Request $request, $id)
    {
        //
        $info = Informations::findOrFail($id);
        $info->update([
            'recipe_name' => $request->recipe_name,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
        ]);
        return redirect()->route('admin.recipe.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }
    

    public function destroy()
    {
    }

}
