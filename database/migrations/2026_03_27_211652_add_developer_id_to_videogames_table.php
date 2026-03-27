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
        Schema::table('videogames', function (Blueprint $table) {
            //
            $table->foreignId('developer_id')->after('anno_videogame')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videogames', function (Blueprint $table) {
            //
            $table->dropForeign('videogames_developer_id_foreign');
            $table->dropColumn('developer_id');
        });
    }
};
