@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Gallery</h3>
                    <button class="btn btn-primary btn-sm mb-2" type="button" data-toggle="modal"
                        data-target="#create-gallery">
                        Add New
                    </button>
                </div>
                <div class="row masonry-grid">
                    @forelse ($galleries as $gallery)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset($gallery->image->url) }}" alt="" class="img-fluid">


                                    <p>{{ $gallery->name }}</p>
                                    <input type="text" value="{{ asset($gallery?->image?->url) }}"
                                        id="copy-data-{{ $gallery->id }}" class="form-control mt-2">
                                    <div class="d-flex justify-content-between mt-2">

                                        <button class="btn btn-primary copy-btn"
                                            data-clipboard-target="#copy-data-{{ $gallery->id }}">
                                            <i class="far fa-copy"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm edit-gallery" data-id="{{ $gallery->id }}"
                                            data-toggle="modal" data-target="#edit-gallery"><i
                                                class="far fa-edit"></i></button>
                                        @include('components.buttons.delete', [
                                            'url' => route('admin.gallery.delete', $gallery->id),
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        No Gallery Item Found
                    @endforelse

                </div>
            </div>

        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="create-gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Image Title <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Image Title"
                                id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label image-label p-2">
                                <img src="" alt="" id="img-preview" class="img-preview">
                                <span class="form-label">Choose Image (800px * 800px)</span>
                                <input type="file" name="image" class="form-control d-none" id="image" required>
                            </label>

                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label"> <input type="checkbox" name="status" id="status"
                                    checked> Show In Gallery
                            </label>

                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success submit-btn">Save</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="edit-gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" class="update-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-label">Image Title <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Image Title"
                                id="edit-name" required>
                        </div>
                        <div class="d-flex my-2">
                            <img src="" alt="" class="w-50 text-center edit-image">

                            <img src="" alt="" id="img-preview-new" class="w-50 img-preview">
                        </div>
                        <div class="form-group">
                            <label for="gallery-image" class="form-label image-label p-2">
                                <span class="form-label">Choose Image (800px * 800px)</span>
                                <input type="file" name="image" class="form-control d-none" id="gallery-image">
                                <input type="hidden" name="old_image" value="" id="old-image">
                            </label>

                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label"> <input type="checkbox" name="status"
                                    id="status" checked> Show In Gallery
                            </label>

                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success submit-btn">Save</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/backend/dist/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/masonry/masonry.pkgd.min.js') }}"></script>

    @include('components.scripts.image-preview', ['id' => 'image', 'preview' => 'img-preview'])
    @include('components.scripts.image-preview', ['id' => 'gallery-image', 'preview' => 'img-preview-new'])
    @include('components.toast.success')
    @include('components.toast.error')
    @include('components.alert.delete')
    <script>
        $(document).ready(function() {
            $('.masonry-grid').masonry();

            $('.edit-gallery').on('click', function() {

                let galleryId = $(this).attr('data-id')
                $.get('/admin/gallery/edit/' + galleryId, function(data) {
                    if (data.status == "success") {
                        $('#edit-name').val(data.data.name);
                        $('#old-image').val(data.data.image.url);
                        $('.edit-image').attr('src', "/" + data.data.image.url);
                        $('.update-form').attr('action', "/admin/gallery/update/" + data.data.id);
                    }
                })
            })

            new ClipboardJS('.copy-btn');
        })
    </script>
@endpush
