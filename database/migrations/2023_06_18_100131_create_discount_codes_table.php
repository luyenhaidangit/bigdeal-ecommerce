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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('discount_code', 40)->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('discount_type')->nullable(false);
            $table->integer('discount_value')->nullable(false);
            $table->decimal('minimum_order_total', 8, 2)->nullable();
            $table->decimal('maximum_discount_amount', 8, 2)->nullable();
            $table->boolean('apply_all')->nullable(false);
            $table->dateTime('start_date')->nullable(false);
            $table->dateTime('expiration_date')->nullable(false);
            $table->integer('usage_limit')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
