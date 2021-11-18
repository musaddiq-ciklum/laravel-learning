<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('category_id')->constrained();
            $table->string('name',100)->unique();
            $table->string('slug',120)->unique();
            $table->string('image',100)->nullable();
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('title',100);
            $table->string('meta_desc',100);
            $table->boolean('active')->default('1');
            $table->timestamps();
            $table->softDeletes();


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
}
