<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            
            $table->id();
            $table->integer('user_id');
            $table->string('uid');
            $table->string('title');
            $table->string('description');
            $table->string('image')->nullable();
            $table->string('duration')->nullable();
            $table->string('price');
            $table->string('category_id')->nullable();
            $table->string('instructor_id')->nullable();
            $table->integer('availability')->default(1);
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
        Schema::dropIfExists('courses');
    }
}
