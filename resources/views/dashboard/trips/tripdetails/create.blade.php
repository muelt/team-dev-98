@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Trip Details</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/trips/tripdetails">
    @csrf
  <!-- <div class="mb-3">
    <label for="timestart" class="form-label">timestart</label>
    <input type="text" class="form-control" id="timestart" name="timestart">
  </div> -->
    <!-- time start picker -->
    <div class="mb-3">
    <label for="timestart" class="form-label">Time Start</label>
    <p><input type="text" name="timestart" id="timepicker"></p>
    @error('timestart')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
    <div class="mb-3">
    <label for="timeend" class="form-label">Time End</label>
    <p><input type="text" name="timeend" id="timepicker"></p>
    @error('timeend')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  
  <!-- trip_id -->
    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
 

  <!-- <div class="mb-3">
    <label for="timeend" class="form-label">timeend</label>
    <input type="text" class="form-control" id="timeend" name="timeend">
  </div> -->
  <div class="mb-3">
    <label for="content" class="form-label">content</label>
    <input type="text" class="form-control" id="content" name="content">
  </div>
  <div class="mb-3">
    <label for="map" class="form-label">map</label>
    <input type="text" class="form-control" id="map" name="map">
  </div>
  <div class="mb-3">
    <label for="link" class="form-label">link</label>
    <input type="text" class="form-control" id="link" name="link">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">image</label>
    <input type="text" class="form-control" id="image" name="image">
  </div>

  <button type="submit" class="btn btn-primary">しおり旅作成する</button>

</form>
</div>


@endsection