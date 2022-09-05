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
            $table->foreignId('trip_id');
            $table->time('timestart')->comment('開始時間');
            $table->time('timeend')->comment('終了時間');
            $table->string('content',100)->comment('目的地・内容');
            $table->string('img')->comment('画像')->nullable();
            $table->string('link')->comment('参考URL')->nullable();
            $table->string('map')->comment('旅先のMAP')->nullable();
            $table->timestamps();
        });
    }
 ///////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////
// TripDetail::create([
//     'trip_id' => 1,
//     'timestart' => '0900',
//     'timeend' => '1000',
//     'content' => 'go to cat cafe'
// ])
// TripDetail::create([
//     'trip_id' => 1,
//     'timestart' => '1015',
//     'timeend' => '1200',
//     'content' => 'go to museum'
// ])
// TripDetail::create([
//     'trip_id' => 1,
//     'timestart' => '1210',
//     'timeend' => '1330',
//     'content' => 'go lunch at buffet restaurant'
// ])
// TripDetail::create([
//     'trip_id' => 1,
//     'timestart' => '1400',
//     'timeend' => '1600',
//     'content' => 'go to concert'
// ])
// ///////////////////////////////////////////////////////
// TripDetail::create([
//     'trip_id' => 2,
//     'timestart' => '0915',
//     'timeend' => '1200',
//     'content' => 'go to museum'
// ])
// TripDetail::create([
//     'trip_id' => 2,
//     'timestart' => '1210',
//     'timeend' => '1330',
//     'content' => 'go lunch at buffet restaurant'
// ])
// TripDetail::create([
//     'trip_id' => 2,
//     'timestart' => '1400',
//     'timeend' => '1600',
//     'content' => 'go to office'
// ])
// TripDetail::create([
//     'trip_id' => 2,
//     'timestart' => '1015',
//     'timeend' => '1200',
//     'content' => 'go home'
// ])
// ///////////////////////////////////////////////////////
// TripDetail::create([
//     'trip_id' => 3,
//     'timestart' => '0810',
//     'timeend' => '0930',
//     'content' => 'go eat breakfast atrestaurant'
// ])
// TripDetail::create([
//     'trip_id' => 3,
//     'timestart' => '900',
//     'timeend' => '1000',
//     'content' => 'go to cat cafe'
// ])
// TripDetail::create([
//     'trip_id' => 3,
//     'timestart' => '1015',
//     'timeend' => '1200',
//     'content' => 'go to museum'
// ])
// TripDetail::create([
//     'trip_id' => 3,
//     'timestart' => '1210',
//     'timeend' => '1330',
//     'content' => 'go lunch at buffet restaurant'
// ])
// ///////////////////////////////////////////////////////
// TripDetail::create([
//     'trip_id' => 4,
//     'timestart' => '0900',
//     'timeend' => '1000',
//     'content' => 'go to cat cafe'
// ])
// TripDetail::create([
//     'trip_id' => 4,
//     'timestart' => '1030',
//     'timeend' => '1200',
//     'content' => 'go to concert'
// ])
// TripDetail::create([
//     'trip_id' => 4,
//     'timestart' => '1210',
//     'timeend' => '1330',
//     'content' => 'go lunch'
// ])
// TripDetail::create([
//     'trip_id' => 4,
//     'timestart' => '1430',
//     'timeend' => '1700',
//     'content' => 'go play basket'
// ])
// ///////////////////////////////////////////////////////
// TripDetail::create([
//     'trip_id' => 5,
//     'timestart' => '09',
//     'timeend' => '1200',
//     'content' => 'go to sauna'
// ])
// TripDetail::create([
//     'trip_id' => 5,
//     'timestart' => '1210',
//     'timeend' => '1330',
//     'content' => 'go lunch at buffet restaurant'
// ])
///////////////////////////////////////////////////////

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
