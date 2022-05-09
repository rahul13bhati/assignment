<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonFeeCollectionHeadwisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_fee_collection_headwises', function (Blueprint $table) {
            $table->id();
            $table->integer('module_id');
            $table->unsignedBigInteger("receipt_id")->index('FK_ReceiptID_idx');
            $table->integer("head_id");
            $table->string('head_name');
            $table->integer('branch_id');
            $table->double('amount',11,2);

            $table->foreign('receipt_id')->references('id')->on('common_fee_collections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_fee_collection_headwises');
    }
}
