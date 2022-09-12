@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/trips" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="キーワードを入力" name="search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit" >検索</button>
        </div>
        </form>
    </div>
</div>

@if($trips->count())

<div class="card mb-3">
  <img src="https://source.unsplash.com/1200x400?{{ $trips[0]->category->name }}" class="card-img-top" alt="{{ $trips[0]->category->name }}">
  <div class="card-body text-center">
    <h3 class="card-title"><a href="/trips/{{ $trips[0]->slug}}" class="text-decoration-none text-dark">{{ $trips[0]->title }}</a></h3>
    <p>
        <small class="text-muted">
            By. <a href="/authors/{{ $trips[0]->author->name }}" class="text-decoration-none">{{ $trips[0]->author->name }}</a> - {{  $trips[0]->created_at->diffForHumans() }}
        </small>
    </p>
    <a href="/categories/{{ $trips[0]->category->name }}" class="text-decoration-none" >{{ $trips[0]->category->name }}</a>
    <p class="card-text">{{ ->body }}</p>

    <a href="/trips/{{ $trips[0]->slug }}" class="text-decoration-none btn btn-primary">続きを読む</a>

  </div>
</div>


<div class="container">
    <div class="row">
@foreach($trips->skip(1) as $trip)
        <div class="col-md-4 mb-3">
        <div class="card">
            <div class="position-absolute px-3 py-2 " style="background-color: rgba(0,0,0, 0.7)"><a href="/categories/{{ $trip->category->slug }}" class="text-decoration-none text-white">{{ $trip->category->name }}</a></div>
            <img src="https://source.unsplash.com/500x400?{{ $trip->category->name }}" class="card-img-top" alt="{{ $trip->category->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $trip->title }}</h5>
                <p>
                    <small class="text-muted">
                        By. <a href="/authors/{{ $trip->author->name }}" class="text-decoration-none">{{ $trip->author->name }}</a> - {{  $trips[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text-prefecture"><a href="/prefectures/{{ $trip->prefecture->name }}" class="text-decoration-none" >{{$trip->prefecture->name}}</a></p>
                <p class="card-text">{{ $trip->body }}</p>
                <a href="/trips/{{ $trip->slug }}" class="btn btn-primary">続きを読む</a>
            </div>
        </div>
        </div>
@endforeach
    </div>
</div>
@else
    <p class='text-center fs-4'>No post found</p>
@endif
@endsection