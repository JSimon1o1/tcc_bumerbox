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
        Schema::table('regioes_interesse_cidade', function (Blueprint $table) {
            $table->unsignedBigInteger('regiao_interesse_id')->after('id');
            $table->foreign('regiao_interesse_id')->references('id')->on('regioes_interesse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regioes_interesse_cidade', function (Blueprint $table) {
            $table->dropForeign('regioes_interesse_cidade_regiao_interesse_id_foreign');
            $table->dropColumn('regiao_interesse_id');
        });
    }
};
