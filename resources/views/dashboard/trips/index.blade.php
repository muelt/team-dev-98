@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Trips</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role='alert'>
  New Trip has added!
</div>
@endif

<div class="table-responsive">
  <a href="/dashboard/trips/create" class="btn btn-primary mb-3">旅のしおりを作成する</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Created At</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($trips as $trip)

            <tr>
              <td>{{ $trip->created_at->diffForHumans() }}</td>
              <td>{{ $trip->title }}</td>
              <td>{{ $trip->category->name }}</td>
              <td>
                <a href="/dashboard/trips/tripdetails/{{ $trip->id }}"><span data-feather="edit-3" class="badge bg-success"></span></a>
                <a href="/dashboard/trips/{{ $trip->slug }}"><span data-feather="eye" class="badge bg-info"></span></a>
                <a href="/dashboard/trips/{{ $trip->slug }}/edit"><span data-feather="edit" class="badge bg-warning"></span></a>
                <form action="/dashboard/trips/{{ $trip->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button onclick="return confirm('Are you sure?')"><span data-feather="x-circle" class="badge bg-danger border-0 "></span></button>
                </form>
              </td>
            </tr>

            @endforeach

          </tbody>
        </table>
      </div>
@endsection