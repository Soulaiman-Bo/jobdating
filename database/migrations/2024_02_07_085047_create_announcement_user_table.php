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
        Schema::create('announcement_user', function (Blueprint $table) {
            $table->unsignedBigInteger('announcement_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['announcement_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_user');
    }
};
