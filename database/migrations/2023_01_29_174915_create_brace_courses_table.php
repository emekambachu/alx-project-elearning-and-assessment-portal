<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBraceCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brace_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brace_module_id');
            $table->string('title');
            $table->text('image')->nullable();
            $table->text('image_path')->nullable();
            $table->text('video')->nullable();
            $table->string('study_timer')->nullable();
            $table->text('objectives');
            $table->text('course_outline')->nullable();
            $table->text('course_contents')->nullable();
            $table->string('content_type')->nullable();
            $table->string('trainers')->nullable();
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
        Schema::dropIfExists('laff_courses');
    }
}
