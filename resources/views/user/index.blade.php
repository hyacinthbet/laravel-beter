@extends('layout.main')
@include('include.sidebar')
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">List of Users</h5>
            <div class="mb-3">
                <form action="/user/list" method="get">
                    <label for="search">Search</label>
                    <input type="text" class="form-control w-100" id="search" name="search" />
                </form>
            </div>

            <div class="table-responsive">
                {{ $users->links() }}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Birth Date</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->middle_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->gender ?? 'No gender' }}</td>
                                <td>{{ $user->birth_date }}</td>
                                <td><img src="{{ ($user->user_image) ? asset('storage/img/user/' . $user->user_image) : asset('image/user.jpg') }}" width="100" height="100" ></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/user/show/{{ $user->user_id }}" class="btn btn-outline-info">View</a>
                                        <a href="/user/edit/{{ $user->user_id }}" class="btn btn-outline-secondary">Edit</a>
                                        <a href="/user/delete/{{ $user->user_id }}" class="btn btn-danger">Delete</a>
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
