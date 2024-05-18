@extends('layout.main')
@section('content')
@include('include.sidebar')
<div class="card mt-3 col-sm-5 mx-auto">
  <div class="card-body">
    <h5 class="card-title">View Gender</h5>
		<form action="#" method="post">
			@csrf
			<div class="mb-3">
				<label for="gender">Gender</label>
				<input type="text" class="form-control" id="gender" name="gender" value="{{ $gender->gender}}" readonly>
				@error('gender')
					<p class="text-danger">{{ $message }}</p>
				@enderror
			</div>
		</form>
    <a href="/genders" class="btn btn-secondary float-end">Back</a>
  </div>
</div>
@endsection
