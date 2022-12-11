@extends('layouts.admin')
@push('css')
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <style>
        .image-label {
            min-height: 200px;
            border: 1px dotted #eee;
            border-radius: 5px;
            margin-top: 10px;
        }

        #gallery-images img,
        #preview-all img {
            margin: 5px 10px;
            border-radius: 5px;
        }

        .delete-btn {
            top: 10px;
            right: 20px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Edit Project Images - {{ $project->title }}</h3>

                    <a href="{{ route('admin.project.index') }}" class="btn btn-warning"><i
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
                        <form action="{{ route('admin.project.update.banner', $project->id) }}" method="post"
                            enctype="multipart/form-data" id="team-store-form">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="hidden" name="old_image" value="{{ $project->banner }}">
                                        <span>Banner Image<span class="text-danger">(900px * 600px)</span></span>
                                        <label for="image" class="form-label image-label p-2 mt-2">
                                            <img src="" alt="" id="img-preview" class="img-preview">
                                            <span class="form-label">Choose Image (JPG, PNG,WebP, Svg)</span>
                                            <input type="file" name="banner" class="form-control d-none" id="image">
                                        </label>
                                        @error('banner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-4">
                                    <span> Old Banner Image</span>
                                    <img src="{{ asset($project->banner) }}" alt="" class="img-fluid rounded">
                                </div>
                            </div>
                            <div class="form-group">
                                @includeIf('components.buttons.submit', [
                                    'text' => 'Update Banner',
                                    'id' => 'add-team',
                                ])
                            </div>
                        </form>
                        <h5>Slider Images</h5>
                        <div class="row">
                            @foreach ($sliders as $slider)
                                <div class="col-3 items position-relative my-2">
                                    <img src="{{ asset($slider->url) }}" alt="" class="img-fluid rounded">
                                    <span class=" position-absolute delete-btn">

                                        @includeIf('components.buttons.delete', [
                                            'url' => route('admin.project.delete.gallery', $slider->id),
                                        ])
                                    </span>

                                </div>
                            @endforeach

                        </div>
                        <form action="{{ route('admin.project.add.slider', $project->id) }}" method="post"
                            enctype="multipart/form-data" id="team-store-form">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <span class="text-bold ml-2">Project Slider Images (JPG, PNG,WebP, Svg)<span class="text-danger">(800px * 600px)</span></span>

                                <div class="col-md-12 col-12">
                                    <label for="multiple-image"
                                        class="d-flex justify-items-center align-items-center image-label">

                                        <div class="preview-all" id="preview-all"></div>
                                        <input type="file" name="slider_item[]" id="multiple-image" class="d-none"
                                            multiple>
                                    </label>

                                </div>

                            </div>
                            <div class="form-group">
                                @includeIf('components.buttons.submit', [
                                    'text' => 'Add To Slider',
                                    'id' => 'add-team',
                                ])
                            </div>
                        </form>

                        <h5>Gallery Images</h5>

                        <div class="row">
                            @foreach ($galleries as $gallery)
                                <div class="col-3 my-2 position-relative">
                                    <img src="{{ asset($gallery->url) }}" alt="" class="img-fluid rounded">
                                    <span class=" position-absolute delete-btn">
                                        @include('components.buttons.delete', [
                                            'url' => route('admin.project.delete.gallery', $gallery->id),
                                        ])
                                    </span>
                                </div>
                            @endforeach

                        </div>
                        <form action="{{ route('admin.project.add.gallery', $project->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <span class="text-bold ml-2">Upload Project Gallery Images (JPG, PNG,WebP, Svg)<span class="text-danger">(800px * 600px)</span></span>

                                <div class="col-md-12 col-12">
                                    <label for="gallery-images"
                                        class="d-flex justify-items-center align-items-center image-label">

                                        <div class="preview-gallery" id="preview-gallery"></div>
                                        <input type="file" name="gallery_item[]" id="gallery-images" class="d-none"
                                            multiple>
                                    </label>

                                </div>


                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', [
                                    'text' => 'Add To Galley',
                                    'id' => 'add-team',
                                ])
                            </div>
                        </form>
                        <h5>Vidoes</h5>
                        <div class="row">
                            @foreach ($videos as $video)
                                <div class="col-3 position-relative">
                                    <div class="mx-2">
                                        <iframe src="https://youtu.be/_A7_tfvt0UY" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                    <span class=" position-absolute delete-btn">
                                        @include('components.buttons.delete', [
                                            'url' => route('admin.project.delete.gallery', $video->id),
                                        ])
                                    </span>

                                </div>
                            @endforeach

                        </div>
                        <form action="{{ route('admin.project.add.video', $project->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>Video Gallery</h6>
                                </div>
                                <div>
                                    <button class="btn btn-primary" id="add-video" type="button">
                                        <i class="fas fa-plus"></i>
                                        Add New Video
                                    </button>
                                </div>

                            </div>
                            <div class="row" id="video-items">
                                <div class="col-md-4 my-1">
                                    <input type="text" name="videos[]" id="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                @includeIf('components.buttons.submit', [
                                    'text' => 'Add Video',
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

    <script src="{{ asset('assets/backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script src="{{ asset('assets/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('components.toast.error')

    @include('components.toast.success')
    @include('components.alert.delete')
    @include('components.scripts.image-preview', [
        'id' => 'image',
        'preview' => 'img-preview',
    ])
    @include('components.tinymce.tinymce', [
        'selector' => 'details',
    ])


    <script>
        $('#start_date').datetimepicker({
            format: 'L'
        });
        $('#end_date').datetimepicker({
            format: 'L'
        });

        // Multile Image preview

        function previewImages() {

            let $preview = $('#preview-all').empty();
            if (this.files) $.each(this.files, readAndPreview);

            function readAndPreview(i, file) {

                if (!/\.(jpe?g|png|gif| webp)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                }

                let reader = new FileReader();

                $(reader).on("load", function() {
                    $preview.append($("<img/>", {
                        src: this.result,
                        height: 200,
                    }));
                });
                reader.readAsDataURL(file);
            }
        }

        $('#multiple-image').on("change", previewImages);

        function previewGalleryImages() {

            let previewInto = $('#preview-gallery').empty();
            if (this.files) $.each(this.files, previewGalleryImage);

            function previewGalleryImage(i, file) {

                if (!/\.(jpe?g|png|gif| webp)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                }

                let fileReader = new FileReader();

                $(fileReader).on("load", function() {
                    previewInto.append($("<img/>", {
                        src: this.result,
                        height: 200,
                    }));
                });
                fileReader.readAsDataURL(file);
            }
        }

        $('#gallery-images').on("change", previewGalleryImages);
        $('#add-video').click(function() {
            let videoItem = `<div class="col-md-4 my-1">
                                <input type="text" name="videos[]" id="" class="form-control">
                            </div>`
            $('#video-items').append(videoItem)
        })
    </script>
@endpush
