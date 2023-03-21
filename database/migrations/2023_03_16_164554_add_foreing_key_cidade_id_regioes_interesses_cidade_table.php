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
            $table->unsignedBigInteger('cidade_id')->after('id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regioes_interesse_cidade', function (Blueprint $table) {
            $table->dropForeign('regioes_interesse_cidade_cidade_id_foreign');
            $table->dropColumn('cidade_id');
        });
    }
};
