@extends('layout.main')

@include('include.sidebar')

@section('content')

  
<div class="card mt-3">
    <div class="card-body">
        <h5 class="card-title">Delete User</h5>
        <p class="card-text">Are you sure do you want to delete this user named "{{$user->first_name}}"?</p>
       
        <form action="/user/destroy/{{ $user->user_id }}" method="post">
            
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger col-sm-3 float-end">YES</button>
        </form>
        <a href="/user/list" class="btn btn-secondary col-sm-3 float-end me-1">No</a>
    </div>
</div>
    
@endsection