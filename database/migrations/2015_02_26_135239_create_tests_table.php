<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function(Blueprint $table)
		{
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('title');
			$table->text('body');
			$table->timestamps();
		});
		DB::statement('ALTER TABLE tests ADD FULLTEXT search(title, body)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tests', function($table)
		{
			$table->dropIndex('search');
		});
		Schema::drop('tests');
	}

}
