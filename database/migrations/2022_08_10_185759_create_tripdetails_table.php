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
        Schema::create('tripdetails', function (Blueprint $table) {
            $table->id();
            $table->int('user_id');
            $table->int('trip_id');
            $table->int('trip_detail_id');
            $table->time('timestart')->comment('開始時間');
            $table->time('timeend')->comment('終了時間');
            $table->string('content',100)->comment('目的地・内容');
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
        Schema::dropIfExists('tripdetails');
    }
};
