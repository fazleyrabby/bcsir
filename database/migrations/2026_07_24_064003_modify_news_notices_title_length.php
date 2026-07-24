<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('title', 1000)->change();
        });
        Schema::table('notices', function (Blueprint $table) {
            $table->string('title', 1000)->change();
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->string('name', 500)->change();
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->string('title', 1000)->change();
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('title', 255)->change();
        });
        Schema::table('notices', function (Blueprint $table) {
            $table->string('title', 255)->change();
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->string('name', 255)->change();
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->string('title', 255)->change();
        });
    }
};
