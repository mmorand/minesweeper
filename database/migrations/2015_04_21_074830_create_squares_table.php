<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSquaresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('squares', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('grid_id')->unsigned();
			$table->tinyInteger('x');
			$table->tinyInteger('y');
			$table->tinyInteger('content');
			$table->boolean('discover')->default(false);
			$table->timestamps();

			$table->foreign('grid_id')
				  ->references('id')
				  ->on('grids');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('squares');
	}

}
