<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_options', function (Blueprint $table) {
            $table->string('color_slug')->nullable();
            $table->string('size_slug')->nullable();
            $table->string('ram_slug')->nullable();
            $table->string('rom_slug')->nullable();
            $table->string('ram_rom_slug')->nullable();
            $table->string('cpu_slug')->nullable();
            $table->string('sweep_frequency_slug')->nullable();
            $table->string('hard_drive_slug')->nullable();
            $table->string('resolution_slug')->nullable();

            $table->index('color_slug');
            $table->index('size_slug');
            $table->index('ram_slug');
            $table->index('rom_slug');
            $table->index('ram_rom_slug');
            $table->index('cpu_slug');
            $table->index('sweep_frequency_slug');
            $table->index('hard_drive_slug');
            $table->index('resolution_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_options', function (Blueprint $table) {
            $table->dropColumn('color_slug');
            $table->dropColumn('size_slug');
            $table->dropColumn('ram_slug');
            $table->dropColumn('rom_slug');
            $table->dropColumn('ram_rom_slug');
            $table->dropColumn('cpu_slug');
            $table->dropColumn('sweep_frequency_slug');
            $table->dropColumn('hard_drive_slug');
            $table->dropColumn('resolution_slug');
        });
    }
};
