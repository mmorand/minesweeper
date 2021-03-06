<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Grid extends Model {

	// Allow users to set following fields
	protected $fillable = [
		'width',
		'height',
		'bombs'
	];

	public function squares()
	{
		return $this->hasMany('App\Square');
	}

}
