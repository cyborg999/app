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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("userid");
            $table->string("firstname");
            $table->string("lastname");
            $table->string("photo")->nullable();
            $table->string("mobile");
            $table->string("address")->nullable();
            $table->date("dob")->nullable();
            $table->boolean("active")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
