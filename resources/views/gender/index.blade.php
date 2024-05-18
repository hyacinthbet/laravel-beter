@extends('layout.main')
@section('content')
@include('include.sidebar')

<div class="card mt-3">
    <div class="card-body">
        <h5 class="card-title">List of Genders</h5>
        <div class="table-responsive">
            @include('include.messages')
            <table class="table">
                <thead>
                    <tr>
                        <th>Gender Image</th>
                        <th>Gender</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genders as $gender)    
                        <tr>
                            <td><img src="{{ ($gender->gender_image) ? asset('public/img/gender/' . $gender->gender_image) : asset('image/gender.png')  }}" width="120" height="80" /></td>
                            <td>{{ $gender->gender }}</td>
                            <td>{{ $gender->created_at}}</td>
                            <td>{{ $gender->updated_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/gender/show/{{ $gender->gender_id }}" class="btn btn-outline-primary">View</a>
                                    <a href="/gender/edit/{{ $gender->gender_id }}" class="btn btn-outline-warning">Edit</a>
                                    <a href="/gender/delete/{{ $gender->gender_id }}" class="btn btn-outline-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection