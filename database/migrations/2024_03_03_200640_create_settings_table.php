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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("tin")->nullable();
            $table->string("dti")->nullable();
            $table->string("logo")->nullable();
            $table->string("mobile")->nullable();
            $table->string("email")->nullable();
            $table->string("website")->nullable();
            $table->string("about")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
