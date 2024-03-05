<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("barcode");
            $table->string("name");
            $table->longText("discount_ids")->nullable();
            $table->longText("description")->nullable();
            $table->float("srp", 8, 2);
            $table->float("orig", 8, 2);
            $table->integer("qty");
            $table->boolean("active")->default(true);
            $table->foreignId("user_id");
            $table->foreignId("category_id")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
