<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->date('borrowed_at');
            $table->date('returned_at')->nullable();
            $table->enum('status', ['Borrowed','Returned'])->default('Borrowed');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('borrow');
    }
};