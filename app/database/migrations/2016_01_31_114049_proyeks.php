<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proyeks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proyeks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('spk');
			$table->string('nm_proyek');
			$table->string('jenis_proyek');
			$table->string('type_proyek');
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
		Schema::drop('proyeks');
	}

}
