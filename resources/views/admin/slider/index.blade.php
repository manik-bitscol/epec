@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Banner List</h3>
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add
                        Bew</a>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $item = 1;
                                @endphp
                                @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{ $item++ }}</td>
                                        <td class="w-25">{{ $slider->title }}</td>
                                        <td class="w-25">{{ $slider->sub_title }}</td>
                                        <td class="w-25"><img class="img-fluid" src="{{ asset($slider->image->url) }}"
                                                alt="">
                                        </td>
                                        <td>
                                            @includeIf('components.buttons.edit', [
                                                'url' => route('admin.slider.edit', $slider->id),
                                            ])@includeIf('components.buttons.delete', [
                                                'url' => route('admin.slider.delete', $slider->id),
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                    No Item Found
                                @endforelse

                            </tbody>
                        </table>
                    </div>

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
@endpush
