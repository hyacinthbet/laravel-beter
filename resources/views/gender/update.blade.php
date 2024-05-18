<form action="/gender/update/{{ $gender->gender_id }}" method="post">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" value="{{ $gender->gender }}" />
        @error('gender') <p class="text-danger">{{ $message }}</p>@enderror
        
    </div>
    <button type="submit" class="btn btn-success col-sm-3 float-end">Save Gender</button>
    <a href="/genders" class="btn btn-secondary col-sm-3 float-end me-1">Back</a>
</form>