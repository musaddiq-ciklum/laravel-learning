<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('size_id')->constrained();
            $table->decimal('cost_price',8,2);
            $table->decimal('sale_price',8,2);
            $table->decimal('msrp', 8, 2)->default(null);
            $table->integer('stock');
            $table->boolean('in_stock')->default('1');
            $table->boolean('is_default')->default('1');
            $table->boolean('active')->default('1');
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
        Schema::dropIfExists('product_size');
    }
}
