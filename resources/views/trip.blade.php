@extends('layouts.main')

@section('container')

<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2 class="mb-3 text-center">{{ $trip->title }}</h2>
      
  </div>
      <p>By. <a href="/authors/{{ $trip->author->name }}" class="text-decoration-none">{{ $trip->author->name }}</a> in <a href="/categories/{{ $trip->category->slug }}" class="text-decoration-none">{{ $trip->category->name  }}</a></p>
      <p>Trip to <a href="/prefectures/{{ $trip->prefecture->slug }}" class="text-decoration-none">{{ $trip->prefecture->name  }}</a>  - {{$trip->date}} </p>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        

      <div class="table-responsive">
        <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">開始時間 ~ 終了時間</th>
              <th scope="col">目的地・内容</th>
              <th scope="col">MAP</th>
              <th scope="col">Link</th>
              <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tripdetails as $tripdetail)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$tripdetail->timestart}} ~ {{$tripdetail->timeend}}</td>
              <td>{{$tripdetail->content}}</td>
              <td><a href="#">MAP</a></td>
              <td><a href="#">LINK</a></td>
              <td><a href="#">IMG</a></td>
              
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
</main>
  </div>
</div>

<a href="/trips">Back top Trips</a>
@endsection