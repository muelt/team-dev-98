<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
use App\Http\Requests\TripRequest;

class TripController extends Controller
{
    /**
     * 旅先一覧の表示
     * @return view
     */

    public function index()
    {   
        // $trips = Trip::all()->sortByDesc('created_at');
        // return view('trips.index',['trips'=>$trips]);

        $trips = Trip::orderByDesc('created_at')->paginate(6);


        return view('trips.index',compact('trips'));


    }

    //キーワード検索を表示する
    public function search(Request $request)
    {
        $trips = Trip::
                 where('title','like',"%{$request->search}%")
                 ->orWhere('prefecture','like',"%{$request->search}%")
                 ->orWhere('cities','like',"%{$request->search}%")
                 ->orWhere('category','like',"%{$request->search}%")
                 ->orderByDesc('created_at')->paginate(6);
        $search_result = $request->search.'の検索結果'.count($trips).'件';
        
        return view('trips.index',[
                'trips'=>$trips,
                'search_result' =>$search_result
        ]);
    }

    // 登録画面を表示する
    public function form()
    {
        return view('trips.form');
    }

     //都道府県の選択
     public function sample() {
        $prefs = config('pref');
        return view('sample')->with(['prefs' => $prefs]);
      }

    // しおりを登録する
    public function register(TripRequest $request)
    {
        //要領重たいものは保存できないので注意　.env確認
        // $request->file('img')->store('public/storage/img/');

        if ($file = $request->img) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('storage/img');
            $file->move($target_path, $fileName);
        } else {
            $fileName = null;
        }
  
        // しおりのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try{
            // しおりを登録する
            // Trip::create($inputs);
            $trip = new Trip;
            $trip->date = $request->date;
            $trip->title = $request->title;
            $trip->prefecture = $request->prefecture;
            $trip->cities = $request->cities;
            $trip->category = $request->category;
            $trip->img = $fileName;
            $trip->save();

            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }     
        
        \Session::flash('err_msg','旅先を登録しました');
            return redirect(route('trips'));
    }
}
