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
        //

        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['agent', 'supervisor', 'admin'])->default('agent')->after('password');
            $table->enum('status', ['available', 'on_call', 'break', 'offline'])->default('offline')->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['agent', 'supervisor', 'admin'])->default('agent')->after('password');
            $table->enum('status', ['available', 'on_call', 'break', 'offline'])->default('offline')->after('role');
        });
    }
};
