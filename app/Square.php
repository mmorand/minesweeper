<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Square extends Model {

	// Allow users to set following fields
	protected $fillable = [
		'x',
		'y',
		'content'
	];

	public function grid()
	{
		return $this->belongsTo('App\Grid');
	}

}
