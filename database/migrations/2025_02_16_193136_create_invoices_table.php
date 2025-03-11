<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->bigInteger('invoice_number')->unsigned()->unique();
            $table->decimal('total_amount', 10, 2);
            $table->enum('status',['Pending','Processing','confirmed'])->default('Pending');

            $table->foreign('order_id')->references('id')->on('orders')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
