<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetaProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiqueta_product', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('etiqueta_id')->constrained('etiquetas');
            $table->primary(['product_id','etiqueta_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etiqueta_product',function (Blueprint $table){
            $table->dropForeign('etiqueta_product_product_id_foreign');
            $table->dropForeign('etiqueta_product_etiqueta_id_foreign');
        });
        Schema::dropIfExists('etiqueta_product');
    }
}
