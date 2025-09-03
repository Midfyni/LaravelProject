<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('penulis_id')->constrained(
                table: 'users',
                indexName: 'articles_penulis_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'category',
                indexName: 'articles_category_id'
            );
            $table->string('slug')->unique();
            $table->string('isi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
