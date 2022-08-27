<!doctype html>
<html lang="ja" >
  <head>
    <title>旅先編集</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body  class="bg-light" >
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>
    <section class="jumbotron text-center">
        <div class="container">
        <h1 class="jumbotron-heading">旅先編集画面</h1>
        <p>
            <a href="/trips" class="btn btn-secondary my-2">旅のしおり一覧にもどる</a>
            <a href="#" class="btn btn-secondary my-2">ログアウト</a>
        </p>
        </div>
    </section>
    <div class="container">
    <div class="order-md-1">
      <h4 class="mb-3">編集する内容を入力してください</h4>
      <!-- <form class="needs-validation" novalidate method="POST" action= enctype="multipart/form-data"> -->
      <form method="POST" action="{{route('update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$trip->id}}">
        <div class="mb-3">
          <input type="date" class="form-control" id="date" name="date" value="{{$trip->date}}">
          @if($errors->has('date'))
            <div class="text-danger">
                {{$errors->first('date')}}
            </div>
          @endif
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="title" name="title" value="{{$trip->title}}" placeholder="タイトル">
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <select class="custom-select d-block w-100" id="prefecture" name="prefecture" value="{{$trip->prefecture}}" placeholder="都道府県" required>
              @foreach(config('pref') as $pref)
                <option value="{{$trip->prefecture}}">{{$pref}}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <input type="text" class="form-control" id="cities" name="cities" placeholder="市町村" value="{{$trip->cities}}" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="category" name="category" value="{{$trip->category}}" placeholder="カテゴリー">
        </div>
        <div class="mb-3">
          <input type="file" class="form-control" id="img" name="img" value="{{$trip->img}}" placeholder="画像添付">
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">保存する</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2018 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';

    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>

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