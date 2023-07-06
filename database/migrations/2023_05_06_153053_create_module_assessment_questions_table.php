<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleAssessmentQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_assessment_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brace_module_id');
            $table->text('question');
            $table->string('option_one');
            $table->string('option_two');
            $table->string('option_three')->nullable();
            $table->string('option_four')->nullable();
            $table->string('option_five')->nullable();
            $table->string('correct_answer')->nullable();
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
        Schema::dropIfExists('module_assessment_questions');
    }
}
