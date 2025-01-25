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
        Schema::table('books', function (Blueprint $table) {
            $table->string(column: 'publisher')->nullable();
            $table->string(column: 'author')->nullable();
            $table->string(column: 'title')->nullable();
            $table->string(column: 'genre')->nullable();
            $table->string(column: 'category')->nullable();
            $table->string(column: 'description')->nullable();
            $table->string(column: 'or_level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
        });
    }
};
