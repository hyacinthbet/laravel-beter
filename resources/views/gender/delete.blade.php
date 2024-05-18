@extends('layout.main')
@section('content')
@include('include.sidebar')
<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">Delete Gender</h5>
    <p class="card-text">Are you sure do you want to delete this gender named "{{ $gender->gender }}?"</p>
    <form action="/gender/destroy/{{$gender->gender_id}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger col-sm-3 float-end">Yes</button>
        <a href="/genders" class="btn btn-secondary col-sm-3 float-end me-1">No</a>
      </form>
    
  </div>

</div>  
@endsection
