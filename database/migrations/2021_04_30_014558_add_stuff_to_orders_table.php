<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStuffToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('user_id')->nullable()->after('product_id');
            $table->string('delivery_fee')->nullable()->after('amount');
            $table->string('quantity')->nullable()->after('amount');
            $table->string('color')->nullable()->after('amount');
            $table->string('size')->nullable()->after('amount');
            $table->string('address')->nullable()->after('amount');
            $table->string('phone')->nullable()->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
