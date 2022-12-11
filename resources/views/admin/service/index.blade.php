@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-body">

                        <h3>Serice List</h3>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $start = 0;
                                @endphp
                                @forelse ($services as $service)
                                    <tr>
                                        <td>{{ ++$start }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td><img src="{{ asset($service->icon) }}" alt="" style="width: 80px"></td>
                                        <td>
                                            <button class="btn btn-success edit-service" data-id="{{ $service->id }}"
                                                data-toggle="modal" data-target="#edit-service"><i
                                                    class="far fa-edit"></i></button>
                                            @includeIf('components.buttons.delete', [
                                                'url' => route('admin.service.delete', $service->id),
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-body">

                        <h3>Add New Service</h3>
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.service.store') }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name" class="form-label">Service Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Image Title"
                                    id="edit-name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex my-2">

                                <img src="" alt="" id="img-preview" class="img-preview"
                                    style="width: 80px;">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label image-label p-2">
                                    <span class="form-label">Choose Image</span>
                                    <input type="file" name="image" class="form-control d-none" id="image">
                                </label>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" class="update-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-label">Service Name</label>
                            <input type="text" name="name" class="form-control" id="service-name" required>
                        </div>
                        <div class="d-flex my-2 text-center">
                            <img src="" alt="" class="text-center edit-image" style="width: 80px;">

                            <img src="" alt="" id="img-preview-new" class="img-preview"
                                style="width: 80px;">
                        </div>
                        <div class="form-group">
                            <label for="gallery-image" class="form-label image-label p-2">
                                <span class="form-label">Choose Image</span>
                                <input type="file" name="image" class="form-control d-none" id="gallery-image">
                                <input type="hidden" name="old_image" value="" id="old-image">
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
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @include('components.scripts.image-preview', ['id' => 'image', 'preview' => 'img-preview'])
    @include('components.scripts.image-preview', [
        'id' => 'gallery-image',
        'preview' => 'img-preview-new',
    ])
    @include('components.toast.success')
    @include('components.toast.error')
    @include('components.alert.delete')
    <script>
        $(document).ready(function() {

            $('.edit-service').on('click', function() {

                let galleryId = $(this).attr('data-id')
                $.get('/admin/service/edit/' + galleryId, function(data) {
                    if (data.status == "success") {
                        $('#service-name').val(data.service.name);
                        $('#old-image').val(data.service.icon);
                        $('.edit-image').attr('src', "/" + data.service.icon);
                        $('.update-form').attr('action', "/admin/service/update/" + data.service
                            .id);
                    }
                })
            })
        })
    </script>
@endpush
