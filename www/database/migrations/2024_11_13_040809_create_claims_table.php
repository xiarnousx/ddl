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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->integer('status_id')->unsigned();
            $table->integer('provider_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('cpt_code_combo_id')->unsigned();
            $table->integer('progress_note_id')->unsigned();
            $table->dateTime('date_of_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
