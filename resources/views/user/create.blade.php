@extends('layout.main')
@include('include.sidebar')
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Create User</h5>
            <form action="/user/store" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="mb-3 col-sm-3">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="mb-3 col-sm-3">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name">
                    </div>
                    <div class="mb-3 col-sm-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="mb-3 col-sm-3">
                        <label for="suffix_name">Suffix Name</label>
                        <input type="text" class="form-control" id="suffix_name" name="suffix_name">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-sm-2">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date">
                    </div>
                    <div class="mb-3 col-sm-2">
                        <label for="gender_id">Gender</label>
                        <select class="form-select" id="gender_id" name="gender_id">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-sm-3">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number">
                    </div>
                    <div class="mb-3 col-sm-4">
                        <label for="email_address">Email Address</label>
                        <input type="text" class="form-control" id="email_address" name="email_address">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-sm-4">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3 col-sm-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3 col-sm-4">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                </div>
                <button type="submit" class="btn btn-success col-sm-3 float-end">Save User</button>
            </form>
        </div>
    </div>
@endsection
