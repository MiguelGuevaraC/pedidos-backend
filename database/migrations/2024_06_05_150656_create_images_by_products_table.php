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
        Schema::create('images_by_products', function (Blueprint $table) {
            $table->id();
            $table->string('route');
            $table->timestamps();
            $table->foreignId('product_id')->nullable()->unsigned()->constrained('products');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_by_products');
    }
};
