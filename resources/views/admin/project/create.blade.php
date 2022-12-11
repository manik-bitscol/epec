@extends('layouts.admin')
@push('css')
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">

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

        .trash-btn {
            position: absolute;
            top: 3px;
            right: 10px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Add New Project</h3>

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
                        <form action="{{ route('admin.project.store') }}" method="post" enctype="multipart/form-data"
                            id="team-store-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="category-id" class="form-label">Categories<span class="text-danger">*</span></label>
                                                <select name="category_id" class="form-control text-capitalize"
                                                    id="category-id" value="{{ old('category_id') }}">
                                                    <option value="">--Select One--</option>
                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @empty
                                                        No Category Found
                                                    @endforelse

                                                </select>
                                                @error('role_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="category" data-toggle="modal" data-target="#add-category"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                                Category</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="type-id" class="form-label">Project Type<span class="text-danger">*</span> </label>
                                                <select name="type_id" class="form-control text-capitalize" id="type-id"
                                                    value="{{ old('type_id') }}">
                                                    <option value="">--Select One--</option>
                                                    @forelse ($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @empty
                                                        No Project Type Found
                                                    @endforelse

                                                </select>
                                                @error('type_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="type" data-toggle="modal" data-target="#add-type"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                                Project Type</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="phase-id" class="form-label">Phases<span class="text-danger">*</span></label>
                                                <select name="phase_id" class="form-control text-capitalize" id="phase-id"
                                                    value="{{ old('phase_id') }}">
                                                    <option value="">--Select One--</option>
                                                    @forelse ($phases as $phase)
                                                        <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                                                    @empty
                                                        No Phases Found
                                                    @endforelse

                                                </select>
                                                @error('phase_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="phase" data-toggle="modal" data-target="#add-phase"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                                Phase</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="location-id" class="form-label">Location<span class="text-danger">*</span></label>
                                                <select name="location_id" class="form-control text-capitalize"
                                                    id="location-id" value="{{ old('location_id') }}">
                                                    <option value=""> --Select One--</option>
                                                    @forelse ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @empty
                                                        No Location Found
                                                    @endforelse

                                                </select>
                                                @error('location_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="location" data-toggle="modal" data-target="#add-location"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                                Location</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Project Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Enter Project Title" id="title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="location_map" class="form-label">Project Location Map</label>
                                        <input type="text" class="form-control" name="location_map"
                                            placeholder="Enter Project Location Map Address" id="location_map"
                                            value="{{ old('location_map') }}">
                                        @error('location_map')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Project Address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter Project Address" id="address"
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duration" class="form-label">Construction Duration</label>
                                        <input type="text" class="form-control" name="duration" id="duration"
                                            placeholder="Construction Duration" value="{{ old('duration') }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Start Date</label>
                                        <div class="input-group date" id="start_date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#start_date" name="start_time">
                                            <div class="input-group-append" data-target="#start_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Complete Date</label>
                                        <div class="input-group date" id="end_date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#end_date" name="complete_time">
                                            <div class="input-group-append" data-target="#end_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="building-size" class="form-label">Building Size (SFT)<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="building_size"
                                            placeholder="Enter Building Size" id="building-size"
                                            value="{{ old('building_size') }}">
                                        @error('building_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="construction-status" class="form-label">Construction Status</label>
                                        <input type="text" class="form-control" name="construction_status"
                                            placeholder="Enter Construction Status" id="construction-status"
                                            value="{{ old('construction_status') }}">
                                        @error('construction_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <span>Banner Image</span>
                                        <label for="image" class="form-label image-label p-2 mt-2">
                                            <img src="" alt="" id="img-preview" class="img-preview">
                                            <span class="form-label">Choose Image<span class="text-danger">*</span>(JPG, PNG,WebP, Svg)(900px * 600px)</span>
                                            <input type="file" name="banner" class="form-control d-none"
                                                id="image" value="{{ old('banner') }}">
                                        </label>
                                        @error('banner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <span class="text-bold ml-2">Project Slider Images<span class="text-danger">*</span> (JPG, PNG,WebP, Svg)(900px * 600px)</span>

                                <div class="col-md-12 col-12">
                                    <label for="multiple-image"
                                        class="d-flex justify-items-center align-items-center image-label">

                                        <div class="preview-all" id="preview-all"></div>
                                        <input type="file" name="slider_item[]" id="multiple-image" class="d-none"
                                            multiple>
                                    </label>

                                </div>

                            </div>

                            <div class="row">
                                <span class="text-bold ml-2">Project Gallery Images<span class="text-danger">*</span> (JPG, PNG,WebP, Svg)(800px * 600px)</span>

                                <div class="col-md-12 col-12">
                                    <label for="gallery-images"
                                        class="d-flex justify-items-center align-items-center image-label">

                                        <div class="preview-gallery" id="preview-gallery"></div>
                                        <input type="file" name="gallery_item[]" id="gallery-images" class="d-none"
                                            multiple>
                                    </label>

                                </div>


                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>Video Gallery (Link)</h6>
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
                                    <label>Gallery Video Link
                                        <input type="text" name="videos[]" id="" class="form-control">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea name="details" id="details" class="form-control">{{ old('details') }}</textarea>

                                @error('details')
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.store') }}" method="post" id="name-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name" class="form-label">Category<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="Enter Category" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @include('components.buttons.submit', [
                                'text' => 'Save',
                                'id' => 'category-store',
                            ])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Project Type Modal -->
    <div class="modal fade" id="add-type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Project Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.type.store') }}" method="post" id="type-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name" class="form-label">Project Type<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="Enter Project Type" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @include('components.buttons.submit', ['text' => 'Save', 'id' => 'role-store'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Phase Modal -->
    <div class="modal fade" id="add-phase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Phase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.phase.store') }}" method="post" id="role-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name" class="form-label">Phase<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required placeholder="Enter Phase"
                                id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @include('components.buttons.submit', ['text' => 'Save', 'id' => 'role-store'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Location Modal -->
    <div class="modal fade" id="add-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.location.store') }}" method="post" id="location-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="Enter Location" id="location" value="{{ old('location') }}">
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @include('components.buttons.submit', [
                                'text' => 'Save',
                                'id' => 'location-store',
                            ])
                        </div>
                    </form>
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
    @include('components.toast.error')
    @include('components.toast.success')
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
            let videoItem = `<div class="col-md-4 my-1 video-link">
                                <label for="gallery-video">Gallery Video Link 
                                    <input type="text" name="videos[]" id="gallery-video" class="form-control video-link">
                                </label>
                                
                            </div>`
            $('#video-items').append(videoItem)
        })


        function removeInput() {
            console.log(this)
            $(e).parent('.video-link').remove();
        }
    </script>
@endpush
