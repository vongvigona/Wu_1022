@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Create Menu</h4>
                </div>
                <div class="card-body">
                    <form id ="form-validation-2" method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id" required>
                                <option value="">-- Select Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="Enter title" required value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Sub Title -->
                        <div class="mb-3">
                            <label class="form-label">Sub Title</label>
                            <input class="form-control @error('sub_title') is-invalid @enderror" type="text" name="sub_title" placeholder="Enter sub title" required value="{{ old('sub_title') }}">
                            @error('sub_title')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                       
                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS Preview -->
<script>
function previewImage(event) {
    var output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
}
</script>
@endsection
