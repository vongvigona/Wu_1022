@extends('layouts.app')
@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Edit Article</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('articles.update', $row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">Menu</label>
                               <select class="form-select @error('menu_id') is-invalid @enderror"
        name="menu_id"
        required>

    <option value="" disabled>Select Menu</option>

    @foreach ($menus as $id => $title)
        <option value="{{ $id }}"
            {{ $id == $row->menu_id ? 'selected' : '' }}>
            {{ $title }}
        </option>
    @endforeach
                            </select>
                            @error('menu_id')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- title -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="Enter title" required
                            value="{{ $row -> title ?? old('title') }}">
                            @error('title')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- sub_title -->
                        <div class="mb-3">
                            <label class="form-label">Sub Title</label>
                            <input class="form-control @error('sub_title') is-invalid @enderror" type="text" name="sub_title" placeholder="Enter sub title"
                            value="{{ $row -> sub_title ?? old('sub_title') }}">
                            @error('sub_title')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
    <label class="form-label">Slug</label>
    <input type="text" name="slug"
           class="form-control @error('slug') is-invalid @enderror"
           value="{{ old('slug', $row->slug) }}">
    @error('slug')
        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
    @enderror
</div>
                        <!-- Content -->
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control">{{ $row -> content ?? old('content') }}</textarea>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control">{{ $row -> description ?? old('description') }}</textarea>
                        </div>


                        <!-- Image -->
                       <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage(event)">
                            <div class="mt-2 w-0 ">
                                <img id="preview" class="rounded shadow-sm" width="120" alt=" Preview"/>
                                @error('image')
                                    <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update Article</button>
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
    const output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = () => URL.revokeObjectURL(output.src);
    }

</script>
@endsection
