<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('business_name');
            $table->string('business_email');
            $table->string('business_country_id');
            $table->tinyInteger('business_registered')->default(0);
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('year_of_operation');
            $table->longText('document')->nullable();
            $table->longText('document_path')->nullable();
            $table->string('type_of_business');
            $table->string('agribusiness_sector');
            $table->string('value_chain_operation');
            $table->string('business_stage');
            $table->longText('business_description');
            $table->longText('number_of_employees');
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
        Schema::dropIfExists('laff_applications');
    }
}
