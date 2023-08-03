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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vending_machine_id')->constrained()->onDelete('cascade');
            $table->foreignId('column_id')->constrained('columns');
            $table->foreignId('product_id')->nullable()->constrained();
            $table->integer('solds')->comment('売上個数');
            $table->integer('discards')->comment('廃棄個数');
            $table->integer('year');
            $table->integer('month');
            $table->integer('date');
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
        Schema::dropIfExists('sales');
    }
};
