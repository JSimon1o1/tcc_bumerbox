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
        Schema::table('estados', function (Blueprint $table) {
            $table->unsignedBigInteger('pais_id')->after('id');
            $table->foreign('pais_id')->references('id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estados', function (Blueprint $table) {
            $table->dropForeign('estados_pais_id_foreign');
            $table->dropColumn('pais_id');
        });
    }
};
