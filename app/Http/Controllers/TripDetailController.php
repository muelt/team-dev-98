<?php

namespace App\Http\Controllers;


use App\Models\Trip;
use App\Models\TripDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripDetailController extends Controller
{
    public function create($id)
    {   
        $tripdetails = TripDetail::where('trip_id', $id)->get();
        $trip = Trip::find($id);

        return view('dashboard.trips.tripdetails.create', [
            'trip' => $trip
        ]);
        
    }

    public function store(Request $request)
    {
        if($request->trip_id != Auth::id())

        $validatedData = $request->validate([
            'timestart' => 'required',
            'timeend' => 'required',
            'content' => 'required',
            'map' => 'nullable',
            'img' => 'nullable',
            'link' => 'nullable',
        ]);

        $validatedData['trip_id'] = $request->trip_id;

        TripDetail::create($validatedData);

        return redirect('/dashboard/trips/')->with('success', 'Add your trip detail!');
        // return redirect('/dashboard/trips/tripdetails/create')->with('success', 'Add your trip detail!');
    }

    // public function index()
    // {
                
    
    //     return view('tripsdetails', [
    //         "title" => "Trip Details",
    //         "tripdetails" => TripDetail::all(),
            
    //     ]);
        
    //     // return view('trips.index', [
    //         //     'trips' => Trip::where('user_id', auth()->user()->id)->get(),
    //         // ]);
            
    //     }
}
