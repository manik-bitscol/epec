@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h3>Testimonial List</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $start = 1;
                                @endphp
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $start++ }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td><img src="{{ asset($testimonial->image?->url) }}" alt=""
                                                style="width: 100px"></td>
                                        <td>
                                            <button class="btn btn-success edit-testimonial"
                                                data-id="{{ $testimonial->id }}" data-toggle="modal"
                                                data-target="#edit-testimonial-form"><i class="far fa-edit"></i></button>
                                            @include('components.buttons.delete', [
                                                'url' => route('admin.testimonial.delete', $testimonial->id),
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                    No Testimonial Item Found
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Testimonial Add New</h5>
                        <form action="{{ route('admin.testimonial.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">Person Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Person Name"
                                    id="name" required {{ old('name') }}>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="profession" class="form-label">Profession<span class="text-danger">*</span></label>
                                <input type="text" name="profession" class="form-control"
                                    placeholder="Enter Person profession" id="profession" required {{ old('profession') }}>
                                @error('profession')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span class="form-label">Choose Image<span class="text-danger">(300px * 250px)</span></span>
                                <label for="image" class="form-label image-label p-2">
                                    <img src="" alt="" id="img-preview" class="img-preview">
                                    <span class="form-label">Choose Image</span>
                                    <input type="file" name="image" class="form-control d-none" id="image" required
                                        value="{{ old('image') }}">
                                </label>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="testimonial" class="form-label">Testimonial<span class="text-danger">*</span></label>
                                <textarea name="testimonial" id="testimonial" class="form-control">{{ old('testimonial') }}</textarea>
                                @error('testimonial')
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

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-testimonial-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Testinonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" id="update-form" action="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-label">Person Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="person-name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="profession" class="form-label">Profession<span class="text-danger">*</span></label>
                            <input type="text" name="profession" class="form-control profession" id="profession"
                                required>
                            @error('profession')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex my-2">
                            <img src="" alt="" class="w-50 text-center edit-image">

                            <img src="" alt="" id="img-preview-new" class="w-50 img-preview">
                            <input type="hidden" name="old_image" value="" id="old-image">
                        </div>
                        <div class="form-group">
                            <span class="form-label">Choose Image<span class="text-danger">(300px * 250px)</span></span>
                            <label for="testimonial-image" class="form-label image-label p-2">

                                <span class="form-label">Choose Image</span>
                                <input type="file" name="image" class="form-control d-none" id="testimonial-image"
                                    value="">
                            </label>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="testimonial" class="form-label">Testimonial<span class="text-danger">*</span></label>
                            <textarea name="testimonial" id="testimonial" class="form-control testimonial"></textarea>
                            @error('testimonial')
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
@endsection
@push('js')
    <script src="{{ asset('assets/backend/dist/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @include('components.scripts.image-preview', ['id' => 'image', 'preview' => 'img-preview'])
    @include('components.scripts.image-preview', [
        'id' => 'testimonial-image',
        'preview' => 'img-preview-new',
    ])
    @include('components.toast.success')
    @include('components.toast.error')
    @include('components.alert.delete')
    <script>
        $(document).ready(function() {

            $('.edit-testimonial').on('click', function() {

                let testimonialId = $(this).attr('data-id');
                $.get('/admin/testimonial/edit/' + testimonialId, function(data) {
                    if (data.status == "success") {
                        console.log("/admin/testimonial/update/" + data.testimonial.id);
                        $('#update-form').attr('action',
                            "/admin/testimonial/update/" + data.testimonial.id);
                        $('#person-name').val(data.testimonial.name);
                        $('.profession').val(data.testimonial.profession);
                        $('.testimonial').text(data.testimonial.testimonial);
                        $('#old-image').val(data.testimonial.image.url);
                        $('.edit-image').attr('src', "/" + data.testimonial.image.url);

                    }
                })
            })
        })
    </script>
@endpush
