<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
          $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->integer('number');
            $table->string('image'); 
            $table->string('password');
            $table->longText('description');
            $table->integer('num_evl');
            $table->integer('all_evl');
            $table->tinyInteger('gender');
            $table->tinyInteger('is_worker');
            $table->tinyInteger('is_active');
            $table->unsignedBigInteger('address_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
