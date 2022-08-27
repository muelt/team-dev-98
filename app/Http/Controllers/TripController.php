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

    //しおりを編集する機能(編集画面表示)
    public function edit($id)
    {
        $trip = Trip::find($id);
        
        if(is_null($trip)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('trips'));
        }
        return view('trips.edit',['trip'=>$trip]);
    }
    //しおりを編集する機能(編集内容登録)
    public function update(TripRequest $request)
    {
        $inputs = $request->all();
        \DB::beginTransaction();

        if ($file = $request->img) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('storage/img');
            $file->move($target_path, $fileName);
        } else {
            $fileName = null;
        }
        //画像の添付があった場合
        if(is_null($fileName)){
            try{
                $trip = Trip::find($inputs['id']);
                $trip->fill([
                    'date' => $inputs['date'],
                    'title' => $inputs['title'],
                    'prefecture' => $inputs['prefecture'],
                    'cities' => $inputs['cities'],
                    'category' => $inputs['category'],
                ]);
                $trip->save();
    
                \DB::commit();
            }catch(\Throwable $e){
                \DB::rollback();
                abort(500);
            }
        }
        // 画像の添付がなかった場合
        else{
            try{
                $trip = Trip::find($inputs['id']);
                $trip->fill([
                    'date' => $inputs['date'],
                    'title' => $inputs['title'],
                    'prefecture' => $inputs['prefecture'],
                    'cities' => $inputs['cities'],
                    'category' => $inputs['category'],
                    'img' => $fileName
                ]);
                $trip->save();
    
                \DB::commit();
            }catch(\Throwable $e){
                \DB::rollback();
                abort(500);
            }
        }
        
        \Session::flash('err_msg','ブログを更新しました');
        return redirect(route('trips'));
    }




    //しおりを削除する機能
    public function delete($id)
    {   
        if(empty($id)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('trips'));
        }
        try{
        $trip = Trip::destroy($id);
        }catch(\Throwable $e){
            abort(500);
        }
        return redirect(route('trips'));
    }
}
