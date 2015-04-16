<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGridsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grids', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('rows');
			$table->tinyInteger('cols');
			$table->tinyInteger('bombs');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grids');
	}

}
