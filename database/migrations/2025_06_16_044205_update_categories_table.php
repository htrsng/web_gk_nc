<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('categories', function (Blueprint $table) {
        if (!Schema::hasColumn('categories', 'slug')) {
            $table->string('slug')->after('name');
        }
        if (!Schema::hasColumn('categories', 'is_active')) {
            $table->boolean('is_active')->default(true)->after('description');
        }
        // Thêm các cột khác nếu cần
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
