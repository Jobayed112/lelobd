<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");

            $table->integer('quantity');
            $table->decimal('price', 10, 2);

            $table->foreign("order_id")
                ->references("id")->on("orders")
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreign("product_id")
                ->references("id")->on("products")
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
