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
        Schema::create('products_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product')->constrained()->onDelete('cascade');
            $table->string('maker', 20)->nullable()->comment('製造メーカー');
            $table->string('supplier', 20)->nullable()->comment('仕入先');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_type');
    }
};
