<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Trip;
use App\Models\TripDetail;
use App\Http\Requests\TripRequest;

class TripController extends Controller
{
    public function index()
    {
        return view('trips', [
            "title" => "All trips",
            "active" => 'trips',
            "trips" => Trip::latest()->get(),
        ]); 
        }
        
    public function show(Trip $trip)
    {
        $tripdetails = TripDetail::where('trip_id', $trip->id)->orderBy('timestart', 'asc')->get();

        return view('trip', [
            "title" => "Single Trip",
            "active" => 'trips',
            "trip" => $trip,
            "tripdetails" => $tripdetails,
        ]);
    }

    
    // 登録画面を表示する
    public function form()
    {
        return view('trips.form');
    }

    //キーワード検索を表示する
    public function search(Request $request)
    {
        $trips = Trip::where('title','like',"%{$request->search}%")
                    ->orWhere('prefecture','like',"%{$request->search}%")
                    ->orWhere('cities','like',"%{$request->search}%")
                    ->orWhere('category','like',"%{$request->search}%")
                    ->orWhere('body','like',"%{$request->search}%")
                    ->paginate(100)->sortByDesc('created_at');
    
        $search_result = $request->search.'の検索結果'.count($trips).'件';
            
        return view('trips.index',[
                'trips'=>$trips,
                'search_result' =>$search_result
        ]);
    }


}