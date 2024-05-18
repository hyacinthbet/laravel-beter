@extends('layout.main')
@include('include.sidebar')
@section('content')
    <div class="card mt-3 col-sm-5 mx-auto">
        <div class="card-body">
            <h5 class="card-title">View User</h5>
            <form action="#" method="post">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">First name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}"
                        id="first_name" readonly>
                </div>
                <div class="mb-3">
                    <label for="middle_name" class="form-label">Middle name:</label>
                    <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}"
                        id="middle_name" readonly>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}"
                        id="last_name" readonly>
                </div>
                <div class="mb-3">
                    <label for="suffix_name" class="form-label">Suffix Name:</label>
                    <input type="text" class="form-control" name="suffix_name" value="{{ $user->suffix_name }}"
                        id="suffix_name" readonly>
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date:</label>
                    <input type="date" class="form-control" name="birth_date" value="{{ $user->birth_date }}"
                        id="birth_date" readonly>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender_id" class="form-control" id="gender" disabled>
                        <option value="1" {{ $user->gender_id == 1 ? 'selected' : '' }}>Male</option>
                        <option value="2" {{ $user->gender_id == 2 ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}" id="address"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="contact_number" class="form-label">Contact Number:</label>
                    <input type="text" class="form-control" name="contact_number" value="{{ $user->contact_number }}"
                        id="contact_number" readonly>
                </div>
                <div class="mb-3">
                    <label for="email_address" class="form-label">Email Address:</label>
                    <input type="email" class="form-control" name="email_address" value="{{ $user->email_address }}"
                        id="email_address" readonly>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" id="username"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="created_at" class="form-label">Created At</label>
                    <input type="text" id="created_at" class="form-control" value="{{ $user->created_at }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="updated_at" class="form-label">Updated At</label>
                    <input type="text" id="updated_at" class="form-control" value="{{ $user->updated_at }}" readonly>
                </div>
                <a href="/user/list" class="btn btn-secondary">Back</a>
        </div>
        </form>
    </div>
    </div>
@endsection
