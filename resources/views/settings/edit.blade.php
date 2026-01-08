@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Sitting</h4>
                </div>
         <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- inputs -->
    <div class="card-body">
                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                               <input class="form-control" type="text" name="title" placeholder="Enter title"
                                required value="{{ old('title', $setting->title) }}">
                            @error('title')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Email -->
                       <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter email"
                                required value="{{ old('email', $setting->email) }}">
                            @error('email')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input class="form-control" type="text" name="phone" placeholder="Enter Phone"
                                required value="{{ old('phone', $setting->phone) }}">
                            @error('phone')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                          </div>

                        <!-- Telegram -->
                           <div class="mb-3">
                            <label for="telegram" class="form-label">Telegram</label>
                            <input class="form-control" type="text" name="telegram" placeholder="Enter telegram"
                                required value="{{ old('telegram', $setting->telegram) }}">
                            @error('telegram')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                        <!-- Facebook -->
                         <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input class="form-control" type="text"
                            name="facebook"
                            placeholder="Enter facebook"
                            required
                            value="{{ old('facebook', $setting->facebook) }}">
                            @error('facebook')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                        <!-- Instagram -->
                            <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input class="form-control" type="text"
                            name="instagram"
                            placeholder="Enter instagram"
                            required
                            value="{{ old('instagram', $setting->instagram) }}">
                            @error('instagram')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                        <!-- YouTube -->
                            <div class="mb-3">
                            <label for="youtube" class="form-label">YouTube</label>
                            <input class="form-control" type="text"
                            name="youtube"
                            placeholder="Enter youtube"
                            required
                            value="{{ old('youtube', $setting->youtube) }}">
                            @error('youtube')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                        <!-- Description -->
                            <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter description">{{ old('description', $setting->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                        <!-- Logo -->
                        <div class="mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" onchange="previewImage(event)">
                            <div class="mt-2">
                                @if($setting->logo)
                                    <img id="output" class="mt-2" width="100" src="{{ asset($setting->logo) }}">
                                @else
                                    <img id="output" class="mt-2" width="100" style="display:none;">
                                @endif
                                @error('logo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update Settings</button>
                        </div>
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
    const output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
    output.onload = () => URL.revokeObjectURL(output.src);
}

</script>
@endsection
