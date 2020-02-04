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
            $table->bigIncrements('id');
            $table->bigInteger('retailer_id')->unsigned();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->text('description');
            $table->string('email_retailer');
            $table->timestamps();
            $table->foreign('retailer_id')->references('id')->on('retailers');
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
