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
        Schema::create('trip_details', function (Blueprint $table) {
            $table->id();
            $table->string('detail',1000)->comment('詳細')->nullable();
            $table->string('title',100)->comment('タイトル');
            $table->date('date')->comment('旅行日');
            $table->time('timestart')->comment('開始時間')->nullable();
            $table->time('timeend')->comment('終了時間')->nullable();
            $table->string('prefecture',50)->comment('都道府県名');
            $table->string('img')->comment('画像')->nullable();
            $table->string('link')->comment('参考URL')->nullable();
            $table->string('map')->comment('旅先のMAP')->nullable();
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
        Schema::dropIfExists('trip_details');
    }
};
