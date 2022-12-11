@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Enter Full Name"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Enter Email Address"
                                    class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" placeholder="Enter Phone Number"
                                    class="form-control">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Enter Password"
                                    class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="confirm-password"
                                    placeholder="Cornfirm Password" class="form-control"
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
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
