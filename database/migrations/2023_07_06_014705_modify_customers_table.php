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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->change();
            $table->string('flat_plot')->nullable()->change();
            $table->string('company_name')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('zip_code')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('region_state')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('phone_number')->nullable(false)->change();
            $table->string('flat_plot')->nullable(false)->change();
            $table->string('company_name')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('zip_code')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('region_state')->nullable(false)->change();
        });
    }
};
