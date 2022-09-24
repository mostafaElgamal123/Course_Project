<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleFamousProgrammerToChangeConstantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('change_constants', function (Blueprint $table) {
            $table->string('title_famousprogrammer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('change_constants', function (Blueprint $table) {
            $table->dropColumn('title_famousprogrammer');
        });
    }
}
