<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('name');
            $table->text('address');
            $table->text('address2')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->integer('quantity');
            // $table->string('payment_method')->nullable();
            $table->string('payment_number')->nullable();
            $table->string('transection')->nullable();
            $table->string('order_number');
            $table->float('sub_total')->nullable();
            $table->float('coupon')->nullable();
            $table->float('total_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('order_status');
            $table->string('country')->nullable();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('post_code')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id', 'orders_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id', 'orders_product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shipping_id', 'orders_shipping_id')->references('id')->on('shippings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_id', 'orders_payment_id')->references('id')->on('payments')->onDelete('cascade')->onUpdate('cascade');
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
