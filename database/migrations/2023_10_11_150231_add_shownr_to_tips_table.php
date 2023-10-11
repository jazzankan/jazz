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
        Schema::table('tips', function (Blueprint $table) {
            Schema::table('tips', function (Blueprint $table) {
                $table->unsignedInteger('shownr')->after('link');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tips', function (Blueprint $table) {
            Schema::table('tips', function($table) {
                $table->dropColumn('shownr');
            });
        });
    }
};
