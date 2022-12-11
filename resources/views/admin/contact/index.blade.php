@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3>Contact List</h3>
                            <button class="btn btn-success add-new-contact" data-toggle="modal"
                                data-target="#add-contact-form">
                                Add New
                            </button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Contact Person</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $start = 1;
                                @endphp
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $start++ }}</td>
                                        <td>{{ $contact?->contact_of }}</td>
                                        <td>{{ $contact?->address }}</td>
                                        <td>{{ $contact?->email }}</td>
                                        <td>{{ $contact?->phone_number }}</td>
                                        <td>
                                            <button class="btn btn-success edit-contact" data-id="{{ $contact->id }}"
                                                data-toggle="modal" data-target="#edit-contact-form"><i
                                                    class="far fa-edit"></i></button>
                                            @include('components.buttons.delete', [
                                                'url' => route('admin.contact.delete', $contact->id),
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                    No Contact Found
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="add-contact-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="cotnact-of" class="form-label">Address Title <span class="text-danger">*</span></label>
                            <input type="text" name="contact_of" class="form-control" placeholder="Enter Addres Title"
                                id="cotnact-of" required {{ old('contact_of') }}>
                            @error('contact_of')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">Address Location <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address Location"
                                id="address" required {{ old('address') }}>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="phone_number" class="form-control" placeholder="Enter Email Address"
                                id="email" required {{ old('email') }}>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone-number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" class="form-control"
                                placeholder="Enter Contact Number" id="phone-number" required {{ old('phone_number') }}>
                            @error('phone_number')
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
    <!-- Edit Modal -->
    <div class="modal fade" id="edit-contact-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" id="update-form" action="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="contact-of-edit" class="form-label">Address Title <span class="text-danger">*</span></label>
                            <input type="text" name="contact_of" class="form-control contact-of-edit"
                                id="contact-of-edit" required>
                            @error('contact_of')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address-edit" class="form-label">Address Location <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control address-edit" id="address-edit"
                                required>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email-edit" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control email-edit" id="email-edit"
                                required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone-number-edit" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" class="form-control phone-number-edit"
                                id="phone-number-edit" required>
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            @includeIf('components.buttons.submit', ['text' => 'Update'])

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
        'id' => 'contact-image',
        'preview' => 'img-preview-new',
    ])
    @include('components.toast.success')
    @include('components.toast.error')
    @include('components.alert.delete')
    <script>
        $(document).ready(function() {

            $('.edit-contact').on('click', function() {

                let contactId = $(this).attr('data-id');
                $.get('/admin/contact/edit/' + contactId, function(data) {
                    if (data.status == "success") {
                        $('#update-form').attr('action',
                            "/admin/contact/update/" + data.contact.id);
                        $('.contact-of-edit').val(data.contact.contact_of);
                        $('.address-edit').val(data.contact.address);
                        $('.email-edit').val(data.contact.email);
                        $('.phone-number-edit').val(data.contact.phone_number);

                    }
                })
            })
        })
    </script>
@endpush
