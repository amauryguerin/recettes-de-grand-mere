<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Carbon;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Recipe::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newRecipe = new Recipe;
        $newRecipe->title = $request->recipe['title'];
        $newRecipe->ingredient = $request->recipe['ingredient'];
        $newRecipe->description = $request->recipe['description'];
        $newRecipe->save();

        return $newRecipe;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existingRecipe = Recipe::find($id);

        if ($existingRecipe) {
            $existingRecipe->title = $request->recipe['title'];
            $existingRecipe->ingredient = $request->recipe['ingredient'];
            $existingRecipe->description = $request->recipe['description'];
            $existingRecipe->updated_at = Carbon::now();
            $existingRecipe->save();
            return $existingRecipe;
        }

        return "Recipe not found";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingRecipe = Recipe::find($id);

        if ($existingRecipe) {
            $existingRecipe->delete();
            return "Recipe deleted";
        }

        return "Recipe not found";

    }
}
