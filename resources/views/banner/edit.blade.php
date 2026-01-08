@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Edit Banner</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('banners.update', $row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $row->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $row->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                            <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                            <img id="output" src="{{ asset('images/banners/'.$row->image) }}" class="mt-2" width="100"/>
                            @error('image')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
