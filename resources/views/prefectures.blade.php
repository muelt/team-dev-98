@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">Trip by Prefecture</h1>

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

@foreach($categories as $category)
    <ul>
        <li>
            <h2><a href="/categories/{{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a></h2>
        </li>
    </ul>
        


@endforeach

<a href="/trips">Back top Trips</a>

@endsection