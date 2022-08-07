<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Traveller;

class TravellerController extends Controller
{
    /**
        * タスク一覧
        *
        * @param Request $request
        * @return Response
        */
        public function index(Request $request)
        {
            $travellers = Traveller::orderBy('created_at', 'asc')->get();
            return view('travellers.index', [
                'travellers' => $travellers,
            ]);
        }
    //
}