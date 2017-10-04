<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('products', function (Blueprint $table) {
            
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('processor_type')->references('id')->on('processors');
            $table->foreign('screen_size')->references('id')->on('measurements');
         
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('products_brand_foreign');
        $table->dropForeign('products_processor_type_foreign');
        $table->dropForeign('products_screen_size_type_foreign');
    }
}
