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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('orderdate')->nullable();
            $table->string('status');
            $table->integer('code')->nullable();
            $table->integer('totalprice');
            $table->integer('totalweight');
            $table->integer('ongkir')->nullable();
            $table->string('kurir')->nullable();
            $table->string('etd')->nullable();
            $table->string('province_destination')->nullable();
            $table->string('city_destination')->nullable();
            $table->text('address')->nullable();
            $table->string('buktipembayaran')->nullable();
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
