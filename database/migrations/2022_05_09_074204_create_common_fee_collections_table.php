<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonFeeCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_fee_collections', function (Blueprint $table) {
            $table->id();
            $table->integer("module_id");
            $table->integer("transaction_id");
            $table->string("admno");
            $table->string("roll_no");
            $table->double("amount",11,2);
            $table->integer('branch_id');
            $table->string("acad_year");
            $table->string('financial_year');
            $table->string('display_receipt_no');
            $table->integer('entry_mode');
            $table->date('paid_date');
            $table->tinyInteger('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_fee_collections');
    }
}
