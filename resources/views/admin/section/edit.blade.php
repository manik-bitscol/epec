@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="heading d-flex justify-content-between">
                            <h3>Edit Section - {{ $section->title }}</h3>

                            <a href="{{ route('admin.section.index') }}" class="btn btn-warning"><i
                                    class="fas fa-long-arrow-alt-left"></i> Back</a>
                        </div>
                        <form method="POST" class="update-form" action="{{ route('admin.section.update', $section->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title" class="form-label">Section Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" id="title" required
                                    value="{{ $section->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub-title" class="form-label">Section Sub Title</label>
                                <input type="text" name="sub_title" class="form-control" id="sub-title"
                                    value="{{ $section?->sub_title }}">
                                @error('sub_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Section Image <span class="text-danger">(600px * 800px)</span></label>
                                <input type="file" name="image" class="form-control" id="image">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="" alt="" class="img-fluid" id="preview">
                                    </div>
                                    <div class="col-6">
                                        <img src="{{ asset($section->image) }}" alt="" class="img-fluid"
                                            id="preview">
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descrption" class="form-label">Description</label>

                                <textarea name="description" id="description" class="form-control">{{ $section?->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-success submit-btn">Save</button>

                            </div>

                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>

    @include('components.tinymce.tinymce', ['selector' => 'description'])
    @include('components.scripts.image-preview', ['id' => 'image', 'preview' => 'preview'])
    @include('components.toast.success')
    @include('components.toast.error')
@endpush
