<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_resources', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('brace_course_id');
            $table->unsignedBigInteger('brace_module_id')->nullable();
            $table->string('title');
            $table->text('url')->nullable();
            $table->text('document')->nullable();
            $table->text('document_path')->nullable();
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
        Schema::dropIfExists('course_resources');
    }
}
