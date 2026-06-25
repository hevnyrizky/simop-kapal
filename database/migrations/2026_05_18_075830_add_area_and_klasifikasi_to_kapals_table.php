<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kapals', function (Blueprint $table) {

            $table->foreignId('area_pelayaran_id')
                ->nullable()
                ->constrained('area_pelayarans')
                ->nullOnDelete();

            $table->foreignId('klasifikasi_id')
                ->nullable()
                ->constrained('klasifikasis')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('kapals', function (Blueprint $table) {

            $table->dropForeign(['area_pelayaran_id']);
            $table->dropForeign(['klasifikasi_id']);

            $table->dropColumn([
                'area_pelayaran_id',
                'klasifikasi_id'
            ]);
        });
    }
};
