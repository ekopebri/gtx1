<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CashIns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cash_in', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('proyek_id');
			$table->string('ok_netto');
			$table->string('proyeksi');
			$table->string('tgl_cash_in');
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
		Schema::drop('cash_in');
	}

}
