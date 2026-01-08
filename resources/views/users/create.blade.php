@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Create User</h4>
                </div>
                <div class="card-body">
                    <form id ="form-validation-2" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
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

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter name" required value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter password">
                            @error('password')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Confirm password">
                            @error('password_confirmation')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Enter phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="Enter address" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                        <div class="mb-3">
                            <label class="form-label">Profile</label>
                            <input type="file" name="profile" class="form-control @error('profile') is-invalid @enderror" onchange="previewImage(event)">
                            <div class="mt-2">
                                <img id="preview" class="rounded shadow-sm" width="120" alt="Profile Preview"/>
                            </div>   
                           <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
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
