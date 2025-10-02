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
    $table->string('name')-> unique();
    $table->integer('stock');
    $table->date('release_date');
    $table->boolean('is_available');
    $table->text('description');
    $table->float('price', 8, 2);
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
