<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetColumnsInOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('shipping_address_2',255)->nullable()->change();
            $table->string('billing_address_2',255)->nullable()->change();
            $table->integer('order_status')->index()->default(1);//1 = pending, 2 = processing, 3 = holded, 4 = canceled, 5 = complete/delivered
            $table->string('coupon_code',255)->nullable();
            $table->float('discount')->default(0);
            $table->float('discount_amount')->default(0);
            $table->float('tax_percent')->default(0);
            $table->float('tax_amount')->default(0);
            $table->integer('user_id')->index()->default(0);
        });
    }
}
