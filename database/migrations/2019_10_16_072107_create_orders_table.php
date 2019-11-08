<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('client_name' ,100);
            $table->bigInteger('client_phone');
            $table->char('order_status' , 100)->default('new_order');
            $table->decimal('total_price' , 30,2);
            $table->text('comments')->nullable();
            $table->char('city' , 255)->nullable();
            $table->char('warehouse' , 255)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
