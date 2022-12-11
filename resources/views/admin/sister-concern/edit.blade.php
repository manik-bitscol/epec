@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Edit Sister Concern</h3>
                    <a href="{{ route('admin.concern.index') }}" class="btn btn-warning"><i
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
                        <form action="{{ route('admin.concern.update', $sisterConcern->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Sister Concern Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Enter Sister Concern Name" id="title"
                                            value="{{ $sisterConcern->title }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter Address Here" id="address"
                                            value="{{ $sisterConcern->address }}">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Sister Concern Phone Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Enter Sister Concern Phone Number" id="phone"
                                            value="{{ $sisterConcern->phone }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter Address Here" id="email"
                                            value="{{ $sisterConcern->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="facebook" class="form-label">Facebook Account<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="facebook"
                                            placeholder="Enter Facebook Account" id="facebook"
                                            value="{{ $sisterConcern->facebook }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="twitter" class="form-label">Twitter Account<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="twitter"
                                            placeholder="Enter Twitter Account" id="twitter"
                                            value="{{ $sisterConcern->twitter }}">
                                        @error('twitter')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="whatsapp" class="form-label">Whats App Account<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="whatsapp"
                                            placeholder="Enter Whats App Account" id="whatsapp"
                                            value="{{ $sisterConcern->whatsapp }}">
                                        @error('whatsapp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="instagram" class="form-label">Instagram Account<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="instagram"
                                            placeholder="Enter Instagram Account" id="instagram"
                                            value="{{ $sisterConcern->instagram }}">
                                        @error('instagram')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <span>Choose Banner Image<span class="text-danger">(1200px * 500px)</span></span>
                                        <label for="banner" class="form-label image-label p-2 mt-2">
                                            <img src="" alt="" id="banner-preview" class="img-fluid">
                                            <span class="form-label">Choose Image (JPG, PNG,WebP, Svg)</span>
                                            <input type="file" name="banner" class="form-control d-none"
                                                id="banner" value="{{ old('banner') }}">
                                        </label>
                                        @error('banner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <span>Choose Main Image<span class="text-danger">(600px * 350px)</span></span>
                                        <label for="image" class="form-label image-label p-2 mt-2">
                                            <img src="" alt="" id="img-preview" class="img-fluid">
                                            <span class="form-label">Choose Image (JPG, PNG,WebP, Svg)</span>
                                            <input type="file" name="image" class="form-control d-none"
                                                id="image" value="{{ old('image') }}">
                                        </label>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="is_active" id="is-active"
                                            {{ $sisterConcern->is_active == 1 ? 'checked' : '' }}>
                                        <label for="is-active" class="form-check-label">Is
                                            Active</label>

                                        @error('is_active')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control">{{ $sisterConcern->description }}</textarea>

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
    ])@include('components.scripts.image-preview', [
        'id' => 'banner',
        'preview' => 'banner-preview',
    ])
    @include('components.tinymce.tinymce', [
        'selector' => 'description',
    ])


    @include('components.toast.error')
    @include('components.toast.success')
@endpush
