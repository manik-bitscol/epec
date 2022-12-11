@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Add New Slider</h3>
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-warning"><i
                            class="fas fa-long-arrow-alt-left"></i> Back</a>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mt-2">
                    <div class="card-body">
                        <form action="{{ route('admin.slider.update', $slider->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title" class="form-label">Slider Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" required
                                    placeholder="Enter Slider Title" id="title" value="{{ $slider->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub-title" class="form-label">Slider Sub Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sub_title" required
                                    placeholder="Enter Slider Sub Title" id="sub-title" value="{{ $slider->sub_title }}">
                                @error('sub_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="btn-text" class="form-label">Button Text<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="btn_text" required
                                    placeholder="Enter Slider Button Text" id="btn-text" value="{{ $slider->btn_text }}">
                                @error('btn_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="btn-link" class="form-label">Button Link<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="btn_link" required
                                    placeholder="Enter Slider Button Text" id="btn-link" value="{{ $slider->btn_link }}">
                                @error('btn_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4 col-12">
                                    <button class="btn btn-success"
                                        onclick="window.open('{{ route('admin.gallery.index') }}','MsgWindow','height:300px,width:500px');">
                                        <span class="icon">Choose Image From Gallery</span>
                                    </button>
                                </div>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="gallery_image"
                                        placeholder="Paste Gallery Image Link">
                                </div>
                            </div>
                            <input type="hidden" name="old_image" value="{{ $slider->image->url }}">
                            <div class="form-group">
                                <span>Choose Image <span class="text-danger">(1200px * 600px)</span></span>
                                <label for="image" class="form-label image-label p-2">
                                    <img src="" alt="" id="img-preview" class="img-preview">
                                    <span class="form-label">Choose Image</span>
                                    <input type="file" name="image" class="form-control d-none" id="image"
                                        value="{{ old('image') }}">
                                </label>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control">{{ $slider->description }}</textarea>

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Save'])
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

    @include('components.toast.error')
@endpush
