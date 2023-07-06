<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBraceModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brace_modules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image')->nullable();
            $table->text('image_path')->nullable();
            $table->text('description')->nullable();
            $table->text('trainers')->nullable();
            $table->text('training_methods')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->integer('sort')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('brace_modules');
    }
}
