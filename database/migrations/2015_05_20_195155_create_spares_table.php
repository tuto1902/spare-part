<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spares', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('model');
            $table->string('set')->nullable();
            $table->string('year')->nullable();
            $table->integer('transmission_id')->unsigned();
            $table->foreign('transmission_id')->references('id')->on('transmissions');
            $table->integer('fuel_id')->unsigned();
            $table->foreign('fuel_id')->references('id')->on('fuels');
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
		Schema::drop('spares');
	}

}
