<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeDirection;
use App\RecipeIngredient;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('created_at','desc')
		        ->get(['id','name','image']);

        return response()->json(['recipes'=> $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$form = Recipe::form();
    	return response()->json([
    			'form' => $form
	    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate($request, [
			    'name' => 'required|max:255',
			    'description' => 'required|max:3000',
	    ]);

	    $ingredients = [];

	    foreach($request->ingredients as $ingredient) {
		    $ingredients[] = new RecipeIngredient($ingredient);
	    }

	    $directions = [];

	    foreach($request->directions as $direction) {
		    $directions[] = new RecipeDirection($direction);
	    }

	    if(!$request->hasFile('image') && !$request->file('image')->isValid()) {
		    return abort(404, 'Image not uploaded!');
	    }
	    $filename = $this->getFileName($request->image);
	    $request->image->move(base_path('public/images'), $filename);

	    $recipe = new Recipe($request->only('name', 'description'));
	    $recipe->image = $filename;

	    $request->user()->recipes()
			    ->save($recipe);

	    $recipe->ingredients()
			    ->saveMany($ingredients);

	    $recipe->directions()
			    ->saveMany($directions);

	    return response()
			    ->json([
					    'saved' => true,
					    'id' => $recipe->id,
					    'message' => 'You have successfully created recipe!'
			    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
