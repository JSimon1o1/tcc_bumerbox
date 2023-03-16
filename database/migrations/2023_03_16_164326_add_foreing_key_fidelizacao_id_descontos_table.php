<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('descontos', function (Blueprint $table) {
            $table->unsignedBigInteger('fidelizacao_id')->after('id');
            $table->foreign('fidelizacao_id')->references('id')->on('fidelizacoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('descontos', function (Blueprint $table) {
            $table->dropForeign('descontos_fidelizacao_id_foreign');
            $table->dropColumn('fidelizacao_id');
        });
    }
};
