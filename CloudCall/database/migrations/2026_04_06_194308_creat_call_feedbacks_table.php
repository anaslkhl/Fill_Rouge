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
        Schema::create('call_feedbacks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('call_log_id')->constrained('call_logs')->cascadeOnDelete();

            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();

            $table->text('feedback');

            $table->unsignedTinyInteger('rating')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
