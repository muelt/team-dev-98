<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Prefecture;
use App\Models\Trip;
use App\Models\TripDetail;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            
        User::factory(5)->create();
        Trip::factory(30)->create();
        TripDetail::factory(200)->create();
        
        Category::create([
            'name' => 'Private',
            'slug' => 'private',
        ]);
        Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
        ]);
        Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);


        Prefecture::create([
            'name' => 'Tokyo',
            'slug' => 'tokyo'
        ]);
        Prefecture::create([
            'name' => 'Fukuoka',
            'slug' => 'fukuoka'
        ]);
        Prefecture::create([
            'name' => 'Awaji',
            'slug' => 'awaji'
        ]);
        Prefecture::create([
            'name' => 'Hiroshima',
            'slug' => 'hiroshima'
        ]);

          ///////////////////////////////////////////////////////
// ////////////////trip tinker ///////////////////////////
// Trip::create([
//     'title' => '東京食べ歩き',
//     'user_id' => 1,
//     'category_id' => 1,
//     'prefecture_id' => 1,
//     'slug' => 'toukyotabearuki',
//     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sequi.',
    
// ])
// Trip::create([
//     'title' => '福岡食べ歩き',
//     'user_id' => 1,
//     'category_id' => 2,
//     'prefecture_id' => 2,
//     'slug' => 'fukuokatabearuki',
//     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sequi.',
// ])
// Trip::create([
//     'title' => '東京買い物',
//     'user_id' => 2,
//     'category_id' => 3,
//     'prefecture_id' => 1,
//     'slug' => 'toukyokaimono',
//     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sequi.',
// ])
// Trip::create([
//     'title' => '淡路旅行',
//     'user_id' => 3,
//     'category_id' => 2,
//     'prefecture_id' => 3,
//     'slug' => 'awajiryoko',
//     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sequi.',
// ])
// Trip::create([
//     'title' => '広島めぐり',
//     'user_id' => 1,
//     'category_id' => 3,
//     'prefecture_id' => 4,
//     'slug' => 'hirosimameguri',
//     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sequi.',
// ])
// ///////////////////////////////////////////////////
// ///////////////////////////////////////////////////


//  ///////////////////////////////////////////////////
//  ////////////// category tinker/////////////////////     
    // Category::create([
    //     'name' => 'Private',
    //     'slug' => 'private',
    // ])
    // Category::create([
    //     'name' => 'Travel',
    //     'slug' => 'travel',
    // ])
    // Category::create([
    //     'name' => 'Work',
    //     'slug' => 'work',
    // ])
//  /////////////////////////////////////////////////// 
//  /////////////////////////////////////////////////// 


//   ///////////////////////////////////////////////////
//  ////////////// prefecture tinker/////////////////////     
    // Prefecture::create([
    //     'name' => 'Tokyo'
    // ])
    // Prefecture::create([
    //     'name' => 'Fukuoka'
    // ])
    // Prefecture::create([
    //     'name' => 'Awaji'
    // ])
    // Prefecture::create([
    //     'name' => 'Hiroshima'
    // ])
 /////////////////////////////////////////////////////// 
 /////////////////////////////////////////////////////// 
 

        // User::create([
        //     'username' => 'kris',
        //     'email' => 'krisdiawan70@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::create([
        //     'username' => 'jono',
        //     'email' => 'jono@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::create([
        //     'username' => 'alex',
        //     'email' => 'alex@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);



//         Trip::create([
//             'title' => '東京食べ歩き',
//             'user_id' => 1,
//             'category_id' => 1,
//             'prefecture_id' => 1,
//             'slug' => 'toukyotabearuki',
//             'date' => '2022/03/01',
//         ]);
//         Trip::create([
//             'title' => '福岡食べ歩き',
//             'user_id' => 1,
//             'category_id' => 2,
//             'prefecture_id' => 2,
//             'slug' => 'fukuokatabearuki',
//             'date' => '2022/03/11',
//         ]);
//         Trip::create([
//             'title' => '東京買い物',
//             'user_id' => 2,
//             'category_id' => 3,
//             'prefecture_id' => 1,
//             'slug' => 'toukyokaimono',
//             'date' => '2022/05/01',
//         ]);
//         Trip::create([
//             'title' => '淡路旅行',
//             'user_id' => 3,
//             'category_id' => 2,
//             'prefecture_id' => 3,
//             'slug' => 'awajiryoko',
//             'date' => '2022/4/01',
//         ]);
//         Trip::create([
//             'title' => '広島めぐり',
//             'user_id' => 1,
//             'category_id' => 3,
//             'prefecture_id' => 4,
//             'slug' => 'hirosimameguri',
//             'date' => '2022/06/19',
//         ]);


//         TripDetail::create([
//             'trip_id' => 1,
//             'timestart' => '090000',
//             'timeend' => '100000',
//             'content' => 'go to cat cafe'
//         ]);
//         TripDetail::create([
//             'trip_id' => 1,
//             'timestart' => '101500',
//             'timeend' => '120000',
//             'content' => 'go to museum'
//         ]);
//         TripDetail::create([
//             'trip_id' => 1,
//             'timestart' => '121000',
//             'timeend' => '133000',
//             'content' => 'go lunch at buffet restaurant'
//         ]);
//         TripDetail::create([
//             'trip_id' => 1,
//             'timestart' => '140000',
//             'timeend' => '160000',
//             'content' => 'go to concert'
//         ]);
//         TripDetail::create([
//             'trip_id' => 2,
//             'timestart' => '091500',
//             'timeend' => '120000',
//             'content' => 'go to museum'
//         ]);
//         TripDetail::create([
//             'trip_id' => 2,
//             'timestart' => '121000',
//             'timeend' => '133000',
//             'content' => 'go lunch at buffet restaurant'
//         ]);
//         TripDetail::create([
//             'trip_id' => 2,
//             'timestart' => '140000',
//             'timeend' => '160000',
//             'content' => 'go to office'
//         ]);
//         TripDetail::create([
//             'trip_id' => 2,
//             'timestart' => '101500',
//             'timeend' => '120000',
//             'content' => 'go home'
//         ]);
//         ///////////////////////////////////////////////////////
//         TripDetail::create([
//             'trip_id' => 3,
//             'timestart' => '081000',
//             'timeend' => '093000',
//             'content' => 'go eat breakfast atrestaurant'
//         ]);
//         TripDetail::create([
//             'trip_id' => 3,
//             'timestart' => '90000',
//             'timeend' => '100000',
//             'content' => 'go to cat cafe'
//         ]);
//         TripDetail::create([
//             'trip_id' => 3,
//             'timestart' => '101500',
//             'timeend' => '120000',
//             'content' => 'go to museum'
//         ]);
//         TripDetail::create([
//             'trip_id' => 3,
//             'timestart' => '121000',
//             'timeend' => '133000',
//             'content' => 'go lunch at buffet restaurant'
//         ]);
//         ///////////////////////////////////////////////////////
//         TripDetail::create([
//             'trip_id' => 4,
//             'timestart' => '090000',
//             'timeend' => '100000',
//             'content' => 'go to cat cafe'
//         ]);
//         TripDetail::create([
//             'trip_id' => 4,
//             'timestart' => '103000',
//             'timeend' => '120000',
//             'content' => 'go to concert'
//         ]);
//         TripDetail::create([
//             'trip_id' => 4,
//             'timestart' => '121000',
//             'timeend' => '133000',
//             'content' => 'go lunch'
//         ]);
//         TripDetail::create([
//             'trip_id' => 4,
//             'timestart' => '143000',
//             'timeend' => '170000',
//             'content' => 'go play basket'
//         ]);
//         ///////////////////////////////////////////////////////
//         TripDetail::create([
//             'trip_id' => 5,
//             'timestart' => '090000',
//             'timeend' => '120000',
//             'content' => 'go to sauna'
//         ]);
//         TripDetail::create([
//             'trip_id' => 5,
//             'timestart' => '121000',
//             'timeend' => '133000',
//             'content' => 'go lunch at buffet restaurant'
//         ]);
}
}