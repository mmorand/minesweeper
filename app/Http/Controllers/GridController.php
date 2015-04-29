<?php namespace App\Http\Controllers;

use App\Grid;
use App\Square;
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

	public function square()
	{
		$input = Request::all();
		$square = Square::where('x', $input['x'])->where('y', $input['y'])->firstOrFail();

		$square->discover = true;
		$square->save();

		if( $square->content == 10 )
			return view('grid.show')->with('message', 'You lose !');

		return redirect('/grid');
	}

	// Store the grid to play
	public function store()
	{
		$input = Request::all();

		$bombs = array();

		$max_square = $input['width'] * $input['height'];
		$array_squares = range(1, $max_square);
		shuffle($array_squares);
		$bombs = array_slice($array_squares, 0, $input['bombs']);

		// delete all grids & all bombs
		Grid::truncate();
		Square::truncate();

		// Create grid with inputs
		Grid::create($input);

		// Assign bombs and number to squares
		$this->setSquares($bombs, $input['width'], $input['height']);

		return redirect('grid');
	}

	private function setSquares( $bombs, $width, $height )
	{
		for ($i=1; $i <= $height; $i++) { 
			for ($j=1; $j <= $width; $j++) { 

				$number = in_array( ((($i-1)*$width) + $j) , $bombs) ? 10 : '';

				$square = new Square;
				$square->grid_id = 1;
				$square->x = $j;
				$square->y = $i;
				$square->discover = false;
				$square->content = $number;
				$square->save();
			}
		}
	}
}
