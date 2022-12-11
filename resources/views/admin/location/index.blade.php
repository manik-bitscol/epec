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

                        <h3>Location List</h3>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $start = 0;
                                @endphp
                                @forelse ($locations as $location)
                                    <tr>
                                        <td>{{ ++$start }}</td>
                                        <td class="text-capitalize">{{ $location->name }}</td>
                                        <td>
                                            <button class="btn btn-success edit-location" data-id="{{ $location->id }}"
                                                data-toggle="modal" data-target="#edit-location"><i
                                                    class="far fa-edit"></i></button>
                                            @includeIf('components.buttons.delete', [
                                                'url' => route('admin.location.delete', $location->id),
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                    No Location Found
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-body">

                        <h3>Add New Location</h3>
                        <form method="POST" action="{{ route('admin.location.store') }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name" class="form-label">Location Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Location Name"
                                    id="edit-name" required>
                                @error('name')
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
    <div class="modal fade" id="edit-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="update-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="location" class="form-label">Location Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="location" required>
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

    @include('components.toast.success')
    @include('components.toast.error')
    @include('components.alert.delete')
    <script>
        $(document).ready(function() {

            $('.edit-location').on('click', function() {

                let locationId = $(this).attr('data-id')
                $.get('/admin/location/edit/' + locationId, function(data) {
                    if (data.status == "success") {
                        $('#location').val(data.location.name);
                        $('.update-form').attr('action', "/admin/location/update/" + data.location
                            .id);
                    }
                })
            })
        })
    </script>
@endpush
