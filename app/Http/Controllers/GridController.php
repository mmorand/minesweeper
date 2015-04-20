<?php namespace App\Http\Controllers;

use App\Grid;
use App\Bombs;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class GridController extends Controller {

	// Display a grid
	public function show()
	{
		$grid = Grid::firstOrFail();

		return view('grid.show', compact('grid'));
	}

	// Create new grid to play
	public function create()
	{
		return view('grid.create');
	}

	// Store the grid to play
	public function store()
	{
		$input = Request::all();

		$bombs = array();

		// Generate bombs
		for ($i=0; $i < $input['bombs']; $i++) { 

			$bomb_x = rand(1, $input['cols']);
			$bomb_y = rand(1, $input['rows']);

			while( in_array($bomb_x.','.$bomb_y, $bombs) == false ) {

				$bomb_x = rand(1, $input['cols']);
				$bomb_y = rand(1, $input['rows']);
	
				if( in_array($bomb_x.','.$bomb_y, $bombs) == false )
					$bombs[$i] = $bomb_x.','.$bomb_y;
			}
		}

		// delete all grids & all bombs
		Grid::truncate();
		Bombs::truncate();

		// Create grid with inputs
		Grid::create($input);
		foreach ($bombs as $bomb) {
			$b = explode(',', $bomb);

			$bo = new Bombs;
			$bo->x = $b[0];
			$bo->y = $b[1];

			$bo->save();
		}

		return redirect('grid');
	}

}
