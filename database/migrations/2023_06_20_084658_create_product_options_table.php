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
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable(false);
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('ram')->nullable();
            $table->string('rom')->nullable();
            $table->string('ram-rom')->nullable();
            $table->string('cpu')->nullable();
            $table->string('sweep_frequency')->nullable();
            $table->string('hard_drive')->nullable();
            $table->string('resolution')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->dateTime('start_date_discount')->nullable();
            $table->dateTime('expiration_date_discount')->nullable();
            $table->text('specification')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_options');
    }
};
