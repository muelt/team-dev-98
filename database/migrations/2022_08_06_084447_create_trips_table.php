<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->date('date')->comment('旅行日')->nullable();
            $table->string('title',100)->comment('タイトル')->nullable();
            $table->string('prefecture',50)->comment('都道府県名')->nullable();
            $table->string('cities',50)->comment('市町村')->nullable();
            $table->string('img')->comment('トップ画像');
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
        Schema::dropIfExists('trips');
    }
};
