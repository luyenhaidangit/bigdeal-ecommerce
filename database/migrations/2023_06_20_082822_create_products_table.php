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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80)->nullable(false);
            $table->string('slug', 80)->unique()->nullable(false);
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->dateTime('start_date_discount')->nullable();
            $table->dateTime('expiration_date_discount')->nullable();
            $table->string('image')->nullable();
            $table->text('short_description')->nullable();
            $table->text('full_description')->nullable();
            $table->text('specification')->nullable();
            $table->string('video_ytb')->nullable();
            $table->integer('view_count')->default(0)->nullable(false);
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
        Schema::dropIfExists('products');
    }
};
