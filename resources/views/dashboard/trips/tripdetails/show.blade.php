@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $trips->title }}</h1>
</div>
<div class="">
  <p>Trip to <a href="/prefectures/{{ $trips->prefecture->slug }}" class="text-decoration-none">{{ $trips->prefecture->name  }}</a>  - {{$trips->date}} </p>
  <p>Category as : <a href="/categories/{{ $trips->category->slug }}" class="text-decoration-none">{{ $trips->category->name  }}</a></p>
  
  <a href="/dashboard/trips" class="btn btn-success mb-3"><span data-feather="arrow-left"></span>back to my trips</a>
  <a href="" class="btn btn-warning mb-3"><span data-feather="edit"></span>edit</a>
  <a href="" class="btn btn-danger mb-3"><span data-feather="x-circle"></span>delete</a>

</div>

<div class="table-responsive">
        <table class="table table-striped table-sm">
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
@endsection