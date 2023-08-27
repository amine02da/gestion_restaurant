<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId("servents_id")->constained("servants")->onDelete("cascade");
            $table->integer("quantity");
            $table->decimal("total_price")->default(0);
            $table->decimal("total_received")->default(0);
            $table->decimal("remaining_amount")->default(0);
            $table->enum("payment_type",["credit_card","cash"])->default("cash");
            $table->enum("payment_status",["pending","paid"])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
