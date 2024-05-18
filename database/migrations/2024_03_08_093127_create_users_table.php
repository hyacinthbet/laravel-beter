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
            $table->id('user_id');
            $table->string('user_image', 255)->nullable();
            $table->string('first_name', 55);
            $table->string('middle_name', 55)->nullable();
            $table->string('last_name', 55);
            $table->string('suffix_name', 55)->nullable();
            $table->date('birth_date');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('address', 55);
            $table->string('contact_number', 55);
            $table->string('email_address', 55);
            $table->string('username', 55);
            $table->string('password', 255);
            $table->timestamps();

            $table->foreign('gender_id')
                ->references('gender_id')
                ->on('genders')
                ->onUpdate('cascade')
                ->onDelete('set null');
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