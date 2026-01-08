@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Create Banner</h4>
                </div>
                <div class="card-body">
                    <form id ="form-validation-2" method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label">Banner</label>
                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id" required>
                                <option value="">-- Select Banner --</option>
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

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter name" required value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Email -->
                       

                        <!-- Profile Image -->
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="profile" class="form-control @error('profile') is-invalid @enderror" onchange="previewImage(event)">
                            <div class="mt-2">
                                <img id="preview" class="rounded shadow-sm" width="120" alt="Profile Preview"/>
                            </div>
                            @error('profile')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Description -->

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
