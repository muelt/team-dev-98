@extends('layouts.main')

@section('container')

<main role="main">

    <div class="input-group row justify-content-center mb-3">
      <div class="col-md-3">
        <form action="{{route('search')}}" method="POST" class="search-form">
        <div class="input-group mb-6">
          <input type="search" id="form1" class="form-control" placeholder="キーワードを入力" name="search"/>
          <button type="submit" class="btn btn-primary ">検索</button>
        </div>
        </form>
        <a href="/trips/form" class="btn btn-secondary my-3 justify-content-center ">旅のしおりを作成する</a>
      </div>
    </div>
    @isset($search_result)
      <div class="search_result">
        <h5 class="card-title">{{$search_result}}</h5>
      </div>
      @endisset
  

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach($trips as $trip)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{ asset('storage/img') }}/{{$trip->img}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text-title">{{ $trip->title }}</p>
              <p class="card-text-prefecture">{{$trip->prefecture}}/{{$trip->cities}}</p>
              <p class="card-text-category">{{$trip->category->name}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href='/trip/{{$trip->id}}'><button type="button" class="btn btn-sm btn-outline-secondary">詳細をみる</button></a>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='/trip/edit/{{$trip->id}}'">修正する</button>
                  <form action="{{route('delete',$trip->id)}}" method="POST" >
                  @csrf
                    <button type="submit" class="btn btn-sm btn-outline-secondary" id="delete-trip-{{ $trip->id }}">削除する</button>
                  </form>
                </div>
                <div class="post-date">
                  <small class="text-muted ">{{$trip->date}}</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {!! $trips->links() !!}
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>TEAM-DEV-98</p>
  </div>
</footer>
<script src="../../assets/js/vendor/holder.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script><script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.3/assets/js/src/application.js"></script>
<script src="/docs/4.3/assets/js/src/search.js"></script>
<script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>

@endsection
