<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CashOuts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cash_out', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('proyek_id');
			$table->string('tgl_cash_out');
			$table->string('nilai_cash_out');
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
		Schema::drop('cash_out');
	}

}
