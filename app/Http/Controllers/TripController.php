<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
use App\Http\Requests\TripRequest;

class TripController extends Controller
{
    /**
        * タスク一覧
        *
        * @param Request $request
        * @return Response
        */

        // public function index(Request $request)
        // {
        //     $trips = Trip::orderBy('created_at', 'asc')->get();
        //     return view('trips.index', [
        //         'trips' => $trips,
        //     ]);
        // }

    /**
     * 旅先一覧の表示
     * @return view
     */

    public function index()
    {
        $trips = Trip::all();
        return view('trips.index',
        ['trips' => $trips]);
    }

    // 登録画面を表示する
    public function form()
    {
        return view('trips.form');
    }

    // しおりを登録する
    public function register(TripRequest $request)
    {
        // ブログのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try{
            // ブログを登録する
            Trip::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }     
        
        \Session::flash('err_msg','旅先を登録しました');
            return redirect(route('trips'));
    }

}
