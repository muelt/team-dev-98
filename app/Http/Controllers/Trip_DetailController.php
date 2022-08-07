<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip_Detail;

class Trip_DetailController extends Controller
{
    /**
        * タスク一覧
        *
        * @param Request $request
        * @return Response
        */
        public function index(Request $request)
        {
            $trip_details = Trip_Detail::orderBy('created_at', 'asc')->get();
            return view('trip_details.index', [
                'trip_details' => $trip_details,
            ]);
        }
    //
}
