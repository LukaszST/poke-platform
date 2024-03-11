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
        Schema::table('card_list_basic_info', function (Blueprint $table) {
            $table->string('set_name')->nullable()->after('card_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('card_list_basic_info', function (Blueprint $table) {
            $table->removeColumn('set_name');
        });
    }
};
