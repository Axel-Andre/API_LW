<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->bigInteger('position');
			$table->text('image')->nullable();
			$table->integer('parent_id');
			$table->boolean('have_child')->default(false);
			$table->boolean('only_for_adult')->default(false);
			$table->boolean('only_for_premium')->default(false);
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}