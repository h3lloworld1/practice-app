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
        Schema::create('orders_sent', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('sauce');
            $table->boolean("double_meat")->default(false);
            $table->text('additional_info')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->integer('phone_number');
            $table->json('sections')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('current_status')->nullable()->default('in_queue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_sent');
    }
};
