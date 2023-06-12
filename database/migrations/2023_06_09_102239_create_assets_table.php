<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->string('asset_number')->unique();
            $table->string('asset_description');
            $table->string('asset_type');
            $table->string('asset_type_other')->nullable();
            $table->string('brand_name');
            $table->date('date_of_purchase')->nullable();
            $table->decimal('purchase_amount', 10, 2)->nullable();
            $table->string('dealer_name')->nullable();
            $table->string('invoice')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
