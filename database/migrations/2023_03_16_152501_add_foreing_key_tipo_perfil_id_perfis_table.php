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
        Schema::table('perfis', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_perfil_id')->after('id');
            $table->foreign('tipo_perfil_id')->references('id')->on('tipos_perfis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfis', function (Blueprint $table) {
            $table->dropForeign('perfis_tipo_perfil_id_foreign');
            $table->dropColumn('tipo_perfil_id');
        });
    }
};
