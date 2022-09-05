@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 pb-2 border-bottom">
    <h1 class="h2">Create New Trip</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/trips" >
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
    @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3" hidden>
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror " id="slug" name="slug" required >
    @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  </div>  
  <!-- datepicker -->
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <p><input type="text" name="date" id="datepicker"></p>
    @error('date')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  
  <div class="mb-3"  >
    <label for="category" class="form-label">Category</label>
    <select class="form-select mb-3" name="category_id">
      <option value="">ーー選択ーー</option>
        @foreach ($categories as $category)
          @if(old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
        
  </select>

  <div class="mb-3"  >
    <label for="prefecture" class="form-label">Prefecture</label>
    <select class="form-select mb-3 " name="prefecture_id">
      <option value="">ーー選択ーー</option>
        @foreach ($prefectures as $prefecture)
          @if(old('prefecture_id') == $prefecture->id)
            <option value="{{ $prefecture->id }}" selected>{{ $prefecture->name }}</option>
          @else
            <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
          @endif
        @endforeach
    </select>
  </div>  

  <div class="mb-3"  >
    <label for="body" class="form-label">Body</label>
    @error('body')
      <p class='text-danger'>{{ $message }}</p>
    @enderror
    <input id='body' type="hidden" name="body" value="{{ old('body') }}">
    <trix-editor input='body'></trix-editor>

  </div> 


  <button type="submit" class="btn btn-primary">しおり旅作成する</button>

</form>
</div>


<script>
 //scrip for slug
  const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
            fetch('/dashboard/trips/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)

});
  // script for trix
  document.addEventListener('trix-file-accept', function(e) {
              e.preventDefault();
          })
          
  $("#datepicker").datepicker({
    onSelect: function() { 
        var dateObject = $(this).datepicker('getDate'); 
    }
    
});
 

</script>
@endsection