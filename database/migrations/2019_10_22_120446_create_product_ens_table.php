<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductEnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name' , 100);
            $table->unsignedBigInteger('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->char('country');
            $table->char('type');
            $table->char('family');
            $table->char('volume');
            $table->char('gender');
            $table->char('article');
            $table->decimal('price' , 30, 2);
            $table->decimal('old_price' , 30, 2);
            $table->char('discount');
            $table->text('characteristics');
            $table->text('characteristics__description');
            $table->boolean('popular');
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
        Schema::dropIfExists('product_ens');
    }
}
