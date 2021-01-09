<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallerysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallerys', function (Blueprint $table) {
            $table->id();
            $table->string('image_name', 128);
            $table->string('image', 128);
            $table->enum('status', array('0','1'))->default('1')->nullable()->comment('0-Inactive,1-Active');
            $table->softDeletes();
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
        Schema::dropIfExists('gallerys');
    }
}
