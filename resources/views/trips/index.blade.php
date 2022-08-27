
<!doctype html>
<html lang="ja" >
  <head>
    <title>旅のしおり一覧</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="album.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body >
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>

  <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><a href="/trips">旅のしおり一覧</a></h1>
      <p class="lead text-muted">これは＜あなた＞の旅のしおり一覧ページです。</p>
      <p>
        <a href="/trips/form" class="btn btn-primary my-2">旅のしおりを作成する</a>
        <a href="#" class="btn btn-secondary my-2">ログアウト</a>
      </p>
    </div>
    <div class="input-group">
      <form action="{{route('search')}}" method="POST" class="search-form">
        @csrf
        <div class="form-outline">
          <input type="search" id="form1" class="form-control" placeholder="キーワードを入力" name="search"/>
          <button type="submit" class="btn btn-primary btn-search">検索</button>
        </div>
      </form>
    </div>
    @isset($search_result)
      <div class="search_result">
        <h5 class="card-title">{{$search_result}}</h5>
      </div>
      @endisset
  </section>

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
              <p class="card-text-category">{{$trip->category}}</p>
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
  </body>
</html>
