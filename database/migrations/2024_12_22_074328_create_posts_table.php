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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('photo')->nullable();
            $table->string('description');
            $table->string('like')->nullable();
            $table->string('dislike')->nullable();
            $table->string('comment')->nullable();
            $table->string('posted_by_name')->nullable();
            $table->string('posted_by_email')->nullable();
            $table->string('posted_by_photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
