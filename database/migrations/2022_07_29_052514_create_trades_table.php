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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('contact_method')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('buyer_side_status')->default('Pending');
            $table->string('seller_side_status')->default('Requested');
            $table->boolean('is_completed')->default(0);
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
        Schema::dropIfExists('trades');
    }
};
