<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('phone_no', 30);
            $table->string('email', 100);
            $table->string('address', 200);
            $table->string('qualification', 200);
            $table->string('unique_name', 50)->unique();
            $table->string('cnic', 50)->unique();
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
        Schema::dropIfExists('teachers');
    }
}
