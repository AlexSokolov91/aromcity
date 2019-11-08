<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderBannerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_banner_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('banner_background');
            $table->char('delivery_icon');
            $table->char('payment_icon');
            $table->char('trust_icon');
            $table->char('discount_icon');
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
        Schema::dropIfExists('header_banner_images');
    }
}
