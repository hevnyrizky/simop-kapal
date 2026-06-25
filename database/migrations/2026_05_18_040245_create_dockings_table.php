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
        Schema::create('dockings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kapal_id')
                ->constrained()
                ->onDelete('cascade');

            $table->date('tanggal_docking');

            $table->string('lokasi');

            $table->string('jenis_docking');

            $table->enum('status', [
                'planned',
                'ongoing',
                'completed'
            ])->default('planned');

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dockings');
    }
};
