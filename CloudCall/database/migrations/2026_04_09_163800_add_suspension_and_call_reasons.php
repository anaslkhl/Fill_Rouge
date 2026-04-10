<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Add is_suspended to users
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_suspended')->default(false)->after('status');
        });

        // Create call_reasons table (qualification list)
        Schema::create('call_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('category')->default('other'); // resolved, unresolved, canceled, other
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_suspended');
        });
        Schema::dropIfExists('call_reasons');
    }
};