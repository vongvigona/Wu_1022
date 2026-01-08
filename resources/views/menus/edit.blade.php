@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Edit Menu</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('menus.update', $row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $row->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <!-- Sub Title -->
                        <div class="mb-3">
                            <label class="form-label">Sub Title</label>
                            <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror"
                                   value="{{ old('sub_title', $row->sub_title) }}" required>
                            @error('sub_title')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $row->description) }}</textarea>
                           
                        </div>
                        <div class="mb-3">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update Menu</button>
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
