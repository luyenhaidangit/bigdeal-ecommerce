<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_locations', function (Blueprint $table) {
            $table->time('max_delivery_time')->change();
            $table->decimal('shipping_fee', 8, 2)->default(0.00)->after('max_delivery_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_locations', function (Blueprint $table) {
            $table->dropColumn('shipping_fee');
            $table->string('max_delivery_time')->change();
        });
    }
};