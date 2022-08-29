<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Category;
use App\Models\TripDetail;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//need to install in terminal
//composer require cviebrock/eloquent-sluggable


class DashboardTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        // dd($trips);
        return view('dashboard.trips.index', [
            'trips' => $trips,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.trips.create', [
            'categories' => Category::all(),
            'prefectures' => Prefecture::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'slug' => 'required',
            'category_id' => 'required',
            'prefecture_id' => 'required',
            'body' => 'required|max:2000'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['body'] = Str::limit(strip_tags($request->body,50));

        Trip::create($validatedData);

        // return redirect('/dashboard/trips/')->with('success', 'Add your trip detail!');
        return redirect('/dashboard/trips')->with('success', 'Add your trip detail!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        $tripdetails = TripDetail::where('trip_id', $trip->id)->orderBy('timestart', 'asc')->get();

        return view('dashboard.trips.tripdetails.show', [
            "title" => "Single Trip",
            "active" => 'trips',
            "trips" => $trip,
            "tripdetails" => $tripdetails,
        ]);
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }

    public function checkSlug (Request $request)
    {
        $slug = SlugService::createSlug(Trip::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function addDetails(Request $request)
    {   
        return view('dashboard.trips.tripdetails.create', [
        ]);
    }


}
