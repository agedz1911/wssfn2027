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
        Schema::table('welcome_messages', function (Blueprint $table) {
            $table->string('name3')->nullable()->after('image2');
            $table->string('title3')->nullable()->after('name3');
            $table->string('image3')->nullable()->after('title3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('welcome_messages', function (Blueprint $table) {
            $table->dropColumn('name3');
            $table->dropColumn('title3');
            $table->dropColumn('image3');
        });
    }
};
