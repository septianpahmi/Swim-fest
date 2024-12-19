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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('participant_name', 60);
            $table->char('gender', 1);
            $table->date('date_of_birth');
            $table->string('address', 150);
            $table->string('province', 30);
            $table->string('city', 30);
            $table->string('district', 30);
            $table->char('zip_code', 5);
            $table->string('school', 100);
            $table->string('email', 50)->nullable();
            $table->string('file_raport', 100);
            $table->string('file_akte', 100);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
