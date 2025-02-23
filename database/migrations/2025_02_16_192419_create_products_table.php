<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('name', 100);
            $table->string('description', 250);
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->string('type')->comment('popular, new, top, special');
            $table->enum("stock", ["instock", "unavailable"])->default("instock");

            $table->foreign('category_id')
                ->references('id')->on('categories')
               ->restrictOnDelete()->cascadeOnUpdate();

               $table->foreign('sub_category_id')
               ->references('id')->on('sub_categories')
              ->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
