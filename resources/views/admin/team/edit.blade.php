@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Edit Team Member</h3>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-warning"><i
                            class="fas fa-long-arrow-alt-left"></i> Back</a>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <form action="{{ route('admin.team.update', $team->id) }}" method="post"
                            enctype="multipart/form-data" id="team-update-form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4 col-8">
                                    <div class="form-group">
                                        <label for="role-id" class="form-label">Role<span class="text-danger">*</span></label>
                                        <select name="role_id" class="form-control text-capitalize" id="role-id" required
                                            value="{{ $team->role_id }}">
                                            <option value="">--Select One--</option>
                                            @forelse ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $role->id = $team->role_id ? 'selected' : '' }}>{{ $role->role }}
                                                </option>
                                            @empty
                                                No Role Found
                                            @endforelse

                                        </select>
                                        @error('role_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2 col-4 mt-4">
                                    <button id="role" data-toggle="modal" data-target="#add-role"
                                        class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                        Role</button>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            placeholder="Enter Name" id="name" value="{{ $team->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="designation" class="form-label">Designation<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="designation" required
                                            placeholder="Enter Designation" id="designation"
                                            value="{{ $team->designation }}">
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="degreee" class="form-label">Education<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="degreee" required
                                            placeholder="Enter Education Qualification" id="degreee"
                                            value="{{ $team->degreee }}">
                                        @error('degreee')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone-1" class="form-label">Phone 1<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone_number_1" id="phone-1"
                                            placeholder="Phone Numebr One" value="{{ $team->phone_number_1 }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone-owner-1" class="form-label">Phone Number Owner<span class="text-danger">*</span></label>
                                        <select name="phone_owner_1" class="form-control" id="phone-owner-1" required
                                            value="{{ $team->phone_owner_1 }}">
                                            <option value="">--Select One--</option>
                                            <option value="office"{{ $team->phone_owner_1 = 'office' ? 'selected' : '' }}>
                                                Office</option>
                                            <option
                                                value="personal"{{ $team->phone_owner_1 = 'personal' ? 'selected' : '' }}>
                                                Personal</option>
                                            <option value="mobile"{{ $team->phone_owner_1 = 'mobile' ? 'selected' : '' }}>
                                                mobile</option>
                                            <option value="others"{{ $team->phone_owner_1 = 'others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                        @error('phone_owner_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone-2" class="form-label">Phone 2<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone_number_2" id="phone-2"
                                            placeholder="Phone Number Two" value="{{ $team->phone_number_2 }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone-owner-2" class="form-label">Phone Number Owner<span class="text-danger">*</span></label>
                                        <select name="phone_owner_2" class="form-control" id="phone-owner-2" required
                                            value="{{ $team->phone_owner_2 }}">
                                            <option value="">--Select One--</option>
                                            <option value="office"{{ $team->phone_owner_2 = 'office' ? 'selected' : '' }}>
                                                Office</option>
                                            <option
                                                value="personal"{{ $team->phone_owner_2 = 'personal' ? 'selected' : '' }}>
                                                Personal</option>
                                            <option value="mobile"{{ $team->phone_owner_2 = 'mobile' ? 'selected' : '' }}>
                                                mobile</option>
                                            <option value="others"{{ $team->phone_owner_2 = 'others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                        @error('phone_owner_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="experience" class="form-label">Working Experice<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="experience" required
                                            placeholder="Enter Working Experice" id="experience"
                                            value="{{ $team->experience }}">
                                        @error('experience')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="facebook-account" class="form-label">Facebook Account <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="facebook_account" required
                                            placeholder="Enter Facebook Account Link" id="facebook-account"
                                            value="{{ $team->facebook_account }}">
                                        @error('facebook_account')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="whatsapp-account" class="form-label">What's App Account
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="whatsapp_account" required
                                            placeholder="Enter What's App Account Link" id="whatsapp-account"
                                            value="{{ $team->whatsapp_account }}">
                                        @error('whatsapp_account')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="instagram-account" class="form-label">Instagram Account <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="instagram_account" required
                                            placeholder="Enter Instagram Account Link" id="instagram-account"
                                            value="{{ $team->instagram_account }}">
                                        @error('instagram_account')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="twitter-account" class="form-label">Twitter Account <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="twitter_account" required
                                            placeholder="Enter Twitter Account Link" id="twitter-account"
                                            value="{{ $team->twitter_account }}">
                                        @error('twitter_account')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="linkedin-account" class="form-label">LinkedIn Account <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="linkedin_account" required
                                            placeholder="Enter LinkedIn Account Link" id="linkedin-account"
                                            value="{{ $team->linkedin_account }}">
                                        @error('linkedin_account')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email-1" class="form-label">Email Account 1<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email_1" required
                                            placeholder="Enter Email Account One" id="email-1"
                                            value="{{ $team->email_1 }}">
                                        @error('email_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email-owner-1" class="form-label">Email Owner<span class="text-danger">*</span></label>
                                        <select name="email_owner_1" class="form-control" id="email-owner-1" required
                                            {{ $team->email_owner_1 }}>
                                            <option value="">--Select One--</option>
                                            <option value="personal"
                                                {{ $team->email_owner_1 = 'personal' ? 'selected' : '' }}>Personal
                                            </option>
                                            <option value="office"
                                                {{ $team->email_owner_1 = 'office' ? 'selected' : '' }}>Office
                                            </option>
                                        </select>
                                        @error('email_owner_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email-2" class="form-label">Email Account 2<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email_2" required
                                            placeholder="Enter Email Account Two" id="email-2"
                                            value="{{ $team->email_2 }}">
                                        @error('email_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email-owner-2" class="form-label">Email Owner<span class="text-danger">*</span></label>
                                        <select name="email_owner_2" class="form-control" id="email-owner-2" required>
                                            <option value="">--Select One--</option>
                                            <option value="personal"
                                                {{ $team->email_owner_2 = 'personal' ? 'selected' : '' }}>Personal
                                            </option>
                                            <option value="office"
                                                {{ $team->email_owner_2 = 'office' ? 'selected' : '' }}>Office
                                            </option>
                                        </select>
                                        @error('email_owner_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span class="form-label">Choose Profile Image <span class="text-danger">(180px * 110px)</span></span>
                                        <label for="image" class="form-label image-label p-2 mt-2">
                                            <img src="" alt="" id="img-preview" class="img-preview">
                                            <span class="form-label">Choose Image (JPG, PNG,WebP, Svg)</span>
                                            <input type="file" name="image" class="form-control d-none"
                                                id="image" value="{{ old('image') }}">
                                            <input type="file" name="old_image" value="{{ $team->image->url }}"
                                                class="d-none">
                                        </label>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span class="form-label">Choose QR Code <span class="text-danger">(300px * 300px)</span></span>
                                        <label for="signature" class="form-label image-label p-2 mt-2">
                                            <img src="" alt="" id="signature-img-preview"
                                                class="signature-img-preview">
                                            <span class="form-label">Choose QR Code (JPG, PNG,WebP, Svg)</span>
                                            <input type="file" name="signature" class="form-control d-none"
                                                id="signature" value="{{ old('signature') }}">
                                            <input type="file" name="old_signature" value="{{ $team->signature }}"
                                                class="d-none">
                                        </label>
                                        @error('signature')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control" required>{{ $team->description }}</textarea>

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @includeIf('components.buttons.submit', [
                                    'text' => 'Save',
                                    'id' => 'team-update',
                                ])
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Add Role Modal -->
    <div class="modal fade" id="add-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.role.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" name="role" required placeholder="Enter Role"
                                id="role" value="{{ old('role') }}">
                            @error('role')
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
@endsection
@push('js')
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
    @include('components.scripts.image-preview', [
        'id' => 'image',
        'preview' => 'img-preview',
    ])
    @include('components.scripts.image-preview', [
        'id' => 'signature',
        'preview' => 'signature-img-preview',
    ])

    @include('components.toast.error')
    @include('components.toast.success')
@endpush
