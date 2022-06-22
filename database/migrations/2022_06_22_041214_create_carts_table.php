<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table-> string('name')->nullable();
            $table-> string('telepon')->nullable();
            $table-> string('alamat')->nullable();
            $table-> string('generic_name')->nullable();
            $table-> string('price')->nullable();
            $table-> string('quantity')->nullable();
            $table-> string('image')->nullable();
            $table-> string('obat_id')->nullable();
            $table-> string('user_id')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
