<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fee_category")->index('FK_FeeCategory_idx');
            $table->string("fee_name")->nullable();
            $table->unsignedBigInteger("collection_id")->index('FK_CollectionId_idx');
            $table->unsignedBigInteger("branch_id")->index('FK_BranchId_idx');
            $table->integer("seq_id");
            $table->string("fee_type_ledger")->nullable();
            $table->integer("fee_headtype");
            $table->tinyInteger('is_active')->default(1);

            $table->foreign('fee_category')->references('id')->on('fee_categories');
            $table->foreign('collection_id')->references('id')->on('fee_collection_types');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_types');
    }
}
