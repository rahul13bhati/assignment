<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("transaction_id")->index('FK_TranID_idx');
            $table->integer('module_id');
            $table->double('amount', 11, 2);
            $table->integer('head_id');
            $table->string("crdr",30);
            $table->integer("branch_id");
            $table->string("head_name");

            $table->foreign('transaction_id')->references('id')->on('financial_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_transaction_details');
    }
}
