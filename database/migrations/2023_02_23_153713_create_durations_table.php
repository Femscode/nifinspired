<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('durations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('year')->nullable();
            $table->string('january');
            $table->string('february');
            $table->string('march');
            $table->string('april');
            $table->string('may');
            $table->string('june');
            $table->string('july');
            $table->string('august');
            $table->string('september');
            $table->string('october');
            $table->string('november');
            $table->string('december');
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
        Schema::dropIfExists('durations');
    }
}
