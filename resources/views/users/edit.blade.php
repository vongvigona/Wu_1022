@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Edit User</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $row->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $row->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $row->phone) }}">
                            @error('phone')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                        <div class="mb-3">
                            <label class="form-label">Profile</label>
                            <input type="file" name="profile" class="form-control @error('profile') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                            <img id="output" src="{{ asset('images/profiles/'.$row->profile) }}" class="mt-2" width="100"/>
                            @error('profile')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $row->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update User</button>
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
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src);
    }
}
</script>
@endsection
