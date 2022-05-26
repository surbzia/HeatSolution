<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id')->index();
            $table->string('name',255)->index();
            $table->string('slug',255)->index();  
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->integer('level')->default(0);
            $table->tinyInteger('show_in_menu')->default(0);
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
        Schema::dropIfExists('services');
    }
}
