<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loans extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('proyek_id');
			$table->string('cash_in');
			$table->string('cash_out');
			$table->string('cash_dwi1');
			$table->string('cash_dwi2');
			$table->date('tgl_dwi1');
			$table->date('tgl_dwi2');
			$table->string('cash_konvensional');
			$table->string('cash_bank');
			$table->string('ket');
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
		Schema::drop('loans');
	}

}
