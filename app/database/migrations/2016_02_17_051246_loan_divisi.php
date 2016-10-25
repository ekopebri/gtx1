<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoanDivisi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_divloan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('divisi_id');
			$table->string('cash_in');
			$table->string('cash_out');
			$table->string('cash_dwi1');
			$table->string('cash_dwi2');
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
		Schema::drop('tb_divloan');
	}

}
