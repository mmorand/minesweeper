<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GridController extends Controller {

	// Create new grid to play
	public function create()
	{
		return view('grid.create');
	}

	// Display a grid
	public function show($id)
	{
		$grid = \App\Grid::findOrFail($id);
		return view('grid.show', compact('grid'));
	}

}
