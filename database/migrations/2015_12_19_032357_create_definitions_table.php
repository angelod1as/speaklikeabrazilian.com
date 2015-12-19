<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definitions', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('expression_id')->unsigned();
			$table->foreign('expression_id')->references('id')->on('expressions')->onDelete('cascade');
			$table->string('description', 1000);
			$table->string('example', 1000);
			$table->string('tags', 100);
			$table->char('status', 1);
			$table->string('email');
			$table->string('contributor', 50);
            $table->string('user_ip', 50)->nullable();
            $table->integer('language_id')->unsigned()->default(1); // 1 is en, there is no increments in this table, only constants;
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
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
        Schema::drop('definitions');
    }
}