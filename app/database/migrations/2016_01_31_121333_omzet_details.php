<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OmzetDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('omzet_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('proyek_id');
			$table->string('sbu');
			$table->string('sumber_dana');
			$table->string('perolehan_dana');
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
		Schema::drop('omzet_detail');
	}

}
