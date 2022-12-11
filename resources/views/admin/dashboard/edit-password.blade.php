@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('admin.change.password.update') }}" method="post">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <input type="password" name="old_password" id="old_password"
                                    placeholder="Enter Old Password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="new_password" id="new_password"
                                    placeholder="Enter New Password" class="form-control">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password"
                                    placeholder="Cornfirm Password" class="form-control"
                                    value="{{ old('confirm_password') }}">
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @include('components.buttons.submit', ['text' => 'Save'])
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
    @include('components.toast.error')
@endpush
