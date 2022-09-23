@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">

              <!-- alert successfull registeration -->
              @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              
              <!-- alert login failed -->
              @if(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('loginError') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

        <main class="form-signin m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">ログインしてください</h1>
            <form action="/login" method="post">
              @csrf
              <!-- email -->
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="floatingInput">メールアドレス</label>
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              <!-- password -->
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="floatingPassword">パスワード</label>
              </div>

              <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button>
            </form>
            <small class="d-block text-center mt-3">
                会員登録していない方は<a href="/register">こちらから登録</a>
                
            </small>
        </main>    
    </div>
</div>


@endsection