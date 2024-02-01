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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->unsignedBigInteger('subcategoryId');
            $table->foreign('subcategoryId')->references('id')->on('sub_categories');
            $table->timestamps();
            $table->double('old_price', 8,2);
            $table->double('new_price', 8,2);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('shipping_n_returns')->nullable();
            $table->integer('status')->default(0)->comment('0 - Active, 1 - Inactive');
            $table->integer('is_delete')->default(0)->comment('0 - Active, 1 - Inactive');
            $table->unsignedBigInteger('createdBy');
            $table->foreign('createdBy')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
