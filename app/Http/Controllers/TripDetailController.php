<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TripDetail;
use App\Models\Trip;

class TripDetailController extends Controller
{
    // /**
    //     * タスク一覧
    //     *
    //     * @param Request $request
    //     * @return Response
    //     */
    //     public function index(Request $request)
    //     {
    //         $tripdetails = TripDetail::orderBy('created_at', 'asc')->get();
    //         return view('tripdetails.index', [
    //             'tripdetails' => $tripdetails,
    //         ]);
    //     }

    /**
     * 旅先一覧の表示
     * @param int $id
     * @return view
     */

    public function index($id)
    {   
        $tripdetails = TripDetail::all();
        $trip = Trip::find($id);

        if(is_null($trip)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('trips'));
        }

        return view('tripdetails.index',['trip' => $trip,'tripdetails'=>$tripdetails]);
    }
    //
    
}
