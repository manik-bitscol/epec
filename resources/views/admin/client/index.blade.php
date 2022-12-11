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

                        <h3>Clients</h3>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $start = 0;
                                @endphp
                                @forelse ($clients as $client)
                                    <tr>
                                        <td class="w-25">{{ ++$start }}</td>
                                        <td class="text-capitalize w-25">{{ $client->title }}</td>
                                        <td class="text-capitalize w-25"><img src="{{ asset($client->image) }}"
                                                alt="{{ $client->title }}" class="w-100">
                                        </td>
                                        <td class="w-25">
                                            <button class="btn btn-success edit-client" data-id="{{ $client->id }}"
                                                data-toggle="modal" data-target="#edit-client"><i
                                                    class="far fa-edit"></i></button>
                                            @includeIf('components.buttons.delete', [
                                                'url' => route('admin.client.delete', $client->id),
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                    No Phase Found
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-body">

                        <h3>Add New Client</h3>
                        <form method="POST" action="{{ route('admin.client.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="title" class="form-label">Client Name <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Client Title"
                                    id="title" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Client Image (120px*80px)</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button client="submit" class="btn btn-success submit-btn">Save</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
                    <button client="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="update-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="client" class="form-label">Client Name <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control client" id="client" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Client Logo (120px*80px)</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <input type="hidden" name="old_image" class="form-control" id="old-image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button client="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button client="submit" class="btn btn-success submit-btn">Save</button>

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

            $('.edit-client').on('click', function() {

                let clientId = $(this).attr('data-id')
                $.get('/admin/client/edit/' + clientId, function(data) {
                    if (data.status == "success") {
                        console.log(data);
                        $('.client').val(data.client.title);
                        $('#old-image').val(data.client.image);
                        $('.update-form').attr('action', "/admin/client/update/" + data.client
                            .id);
                    }
                })
            })
        })
    </script>
@endpush
