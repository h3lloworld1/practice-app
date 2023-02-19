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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->boolean('status')->default(false);
            $table->boolean('double_meat')->nullable()->default(false);
            $table->string('category');
            $table->text('additional_info')->nullable();
            $table->longText('ingredients');
            $table->text('allergens')->nullable();
            $table->string('thumbnail')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
