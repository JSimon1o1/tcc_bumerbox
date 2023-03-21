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
            $table->unsignedBigInteger('usuario_id')->after('id');
            $table->string('tipo_perfil_codigo')->after('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('tipo_perfil_codigo')->references('codigo')->on('tipos_perfil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfis', function (Blueprint $table) {
            $table->dropForeign('perfis_usuario_id_foreign');
            $table->dropForeign('perfis_tipo_perfil_codigo_foreign');
            $table->dropColumn('tipo_perfil_codigo');
        });
    }
};
