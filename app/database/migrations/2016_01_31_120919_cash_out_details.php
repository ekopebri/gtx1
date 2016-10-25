<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CashOutDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cash_out_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('proyek_id');
			$table->string('cash_proyek');
			$table->string('cash_departemen');
			$table->string('cash_fasilitas');
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
		Schema::drop('cash_out_detail');
	}

}
