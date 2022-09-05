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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('パスワード');
            $table->rememberToken();
            $table->timestamps();
        });
    }

 ///////////////////////////////////////////////////
 ////////////////// user tinker/////////////////////   
    // User::create([
    //     'username' => 'kris',
    //     'email' => 'krisdiawan70@gmail.com',
    //     'password' => bcrypt('12345')
    // ])
    // User::create([
    //     'username' => 'jono',
    //     'email' => 'jono@gmail.com',
    //     'password' => bcrypt('12345')
    // ])
    // User::create([
    //     'username' => 'alex',
    //     'email' => 'alex@gmail.com',
    //     'password' => bcrypt('12345')
    // ])
///////////////////////////////////////////////////
///////////////////////////////////////////////////

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
