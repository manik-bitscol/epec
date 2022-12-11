@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Edit Page</h3>
                    <a href="{{ route('admin.page.index') }}" class="btn btn-warning"><i
                            class="fas fa-long-arrow-alt-left"></i> Back</a>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.page.update', $page->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="parent" class="form-label">Select Parent Page</label>
                                        <select name="parent" class="form-control text-capitalize" id="parent"
                                            value="{{ old('parent') }}">
                                            <option value="">--Select As Parent--</option>
                                            <option value="about">About</option>
                                            <option value="service">Service</option>
                                            <option value="factory">Factory</option>
                                        </select>
                                        @error('about')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-3">
                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" name="is_active" id="is-active"
                                            {{ $page->is_active == true ? 'checked' : '' }}>
                                        <label for="is-active" class="form-check-label">Show on Navbar</label>

                                        @error('is_active')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Page Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Enter Page Title" id="title" value="{{ $page->title }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="sub-title" class="form-label">Page Sub Title</label>
                                        <input type="text" class="form-control" name="sub_title"
                                            placeholder="Enter Page Sub Title" id="sub-title"
                                            value="{{ $page?->sub_title }}">
                                        @error('sub_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <span>Choose Banner Image <span class="text-danger">*</span>(1200px * 600px)</span>
                                        <label for="image" class="form-label image-label p-2 mt-2">
                                            <img src="" alt="" id="img-preview" class="img-preview">
                                            <span class="form-label">Choose Image (JPG, PNG,WebP, Svg)</span>
                                            <input type="file" name="image" class="form-control d-none" id="image"
                                                value="{{ old('image') }}">
                                        </label>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="hidden" name="old_image" value="{{ $page?->image?->url }}">
                                    <img alt="" class="img-fluid" src={{ asset($page?->image?->url) }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control">{{ $page->description }}</textarea>

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @includeIf('components.buttons.submit', [
                                    'text' => 'Save',
                                    'id' => 'add-team',
                                ])
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
    @include('components.scripts.image-preview', [
        'id' => 'image',
        'preview' => 'img-preview',
    ])
    @include('components.tinymce.tinymce', [
        'selector' => 'description',
    ])


    @include('components.toast.error')
    @include('components.toast.success')
@endpush
