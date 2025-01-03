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
        Schema::create('participant_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_registration_id');
            $table->unsignedBigInteger('category_event_id');
            $table->integer('no_participant');
            $table->integer('price')->nullable();
            $table->integer('record')->nullable();
            $table->string('jarak')->nullable();
            $table->string('last_record')->nullable();
            $table->string('no_renang')->nullable();
            $table->timestamps();
            $table->foreign('participant_registration_id')->references('id')->on('participant_registrations')->onDelete('cascade');
            $table->foreign('category_event_id')->references('id')->on('category_events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_categories');
    }
};
