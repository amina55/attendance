<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semester');
            $table->enum('section', ['A', 'B']);
            $table->string('name', 100);
            $table->unsignedInteger('roll_no');
            $table->string('enroll_no', 50)->unique();
            $table->string('email', 50)->unique();
            $table->string('phone_no', 30);
            $table->string('address', 200);
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('students');
    }
}
