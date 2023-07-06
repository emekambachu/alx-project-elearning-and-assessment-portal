<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostic_tools', function (Blueprint $table) {
            $table->id();
            $table->enum('question_formate', ['radio_option', 'input_text_option', 'check_box_option', 'select_option']);
            $table->string('question');
            $table->text('options')->nullable();
            $table->boolean('input_text')->default(false);
            $table->boolean('is_condition')->default(false);
            $table->boolean('is_country')->default(false);
            $table->string('condition')->nullable();
            $table->integer('condition_value')->nullable();
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
        Schema::dropIfExists('diagnostic_tools');
    }
}
