<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    
    public function storeDetails(Request $request)
    {
        return $request;
        $validatedData = $request->validate([
            'timestart' => 'required|max:50',
            'timeend' => 'required',
            'content' => 'required',
            'map' => 'nullable',
            'img' => 'nullable',
            'link' => 'nullable',
        ]);

        $validatedData['trip_id'] = trip()->id;

        TripDetail::create($validatedData);

        return redirect('/dashboard/trips/')->with('success', 'Add your trip detail!');
        // return redirect('/dashboard/trips/tripdetails/create')->with('success', 'Add your trip detail!');
    }
}
