<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;

class TripController extends Controller
{
    /**
        * タスク一覧
        *
        * @param Request $request
        * @return Response
        */
        public function index(Request $request)
        {
            $trips = Trip::orderBy('created_at', 'asc')->get();
            return view('trips.index', [
                'trips' => $trips,
            ]);
        }
    //
}
