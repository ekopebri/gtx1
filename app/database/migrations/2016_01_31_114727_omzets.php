<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Omzets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('omzets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('proyek_id');
			$table->string('tgl_omzet');
			$table->string('nilai_omzet');
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
		Schema::drop('omzets');
	}

}
