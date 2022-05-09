<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("module_id");
            $table->integer("transaction_id");
            $table->string('admno');
            $table->double('amount', 11, 2);
            $table->string("crdr",30);
            $table->date("transaction_date");
            $table->string("acad_year",30);
            $table->integer("entry_mode"); 
            $table->string("voucher_no",30);
            $table->integer("branch_id");
            $table->string("consession_type");           
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
        Schema::dropIfExists('financial_transactions');
    }
}
