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
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('barcode')->unique();
            $table->integer('stock')->default(0);
            $table->integer('height_cm');
            $table->integer('width_cm');
            $table->integer('depth_cm');
            $table->integer('weight_gr');
            $table->integer('categorie_id')->nullable();
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
            $table->decimal('selling_price', 8, 2);
            $table->decimal('purchase_price', 8, 2);
            $table->integer('discount_percentage')->default(0);
            $table->integer('kuin_id')->nullable()->unique();
            $table->foreign('categorie_id')->references('id')->on('categories');

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
