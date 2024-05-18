@extends('layout.main')
@section('content')
@include('include.sidebar')
    
<div class="card mt-3 col-sm-7 mx-auto">
    <div class="card-body">
        <h5 class="card-title">Add Gender</h5>
        <form action="/gender/store" method="post">
            @csrf
            <div class="mb-3">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" />
                @error('gender') <p class="text-danger">{{
                    $message}}</p> @enderror
            </div>
            <button type="submit" class="btn btn-success col-sm-3 float-end">Save Gender</button>
            <a href="/genders" class="btn btn-secondary col-sm-3 float-end me-1">Back</a>
        </form>
    </div>
</div>

@endsection