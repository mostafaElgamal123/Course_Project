<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeConstantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_constants', function (Blueprint $table) {
            $table->id();
            $table->string('enrollnow');
            $table->string('title_section_content');
            $table->text('title_video1');
            $table->text('title_video2');
            $table->string('title_section_review');
            $table->string('title_form');
            $table->text('title_form_offer');
            $table->text('submit_form');
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
        Schema::dropIfExists('change_constants');
    }
}
