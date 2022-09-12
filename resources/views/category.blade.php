@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">Trip Category :{{ $category }}</h1>

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

@foreach($trips as $trip)
    <article class="mb-5 border-botom pb-4">
        <h2><a href="/trips/{{ $trip->slug }}" class="text-decoration-none">{{ $trip->title }}</a></h2>
        
        <p>By. <a href="" class="text-decoration-none">{{ $trip->author->name }}</a> in <a href="/categories/{{ $trip->category->slug }}" class="text-decoration-none">{{ $trip->category->name }}</a></p>
       
        <p class="card-text-prefecture">{{$trip->prefecture->name}}/{{$trip->cities}}</p>
        <a href="/categories/{{ $trip->category->name }}" class="text-black text-decoration-none" >{{ $trip->category->name }}</a>
        
        <a href="/trips/{{ $trip->slug }}" class="text-decoration-none">Read more..</a>
        
        <small class="text-muted ">{{$trip->date}}</small>
    </article>
@endforeach


@endsection