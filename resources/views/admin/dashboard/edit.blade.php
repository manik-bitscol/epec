@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset($admin->image->url) }}" alt="" class="img-fluid rounded-circle w-25">
                        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group mt-2">
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $admin->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $admin->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ $admin->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input type="file" name="image" id="image" class="form-control">
                                <input type="hidden" name="old_image" id="old-image" class="form-control"
                                    value="{{ $admin->image->url }}">
                                @error('image')
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
