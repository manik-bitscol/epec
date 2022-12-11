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
                    <h3>Sister Concerns</h3>
                    <a href="{{ route('admin.concern.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New
                        page
                    </a>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Title</th>
                                    <th>Phone Number</th>
                                    <th>Banner Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sisterConcerns as $sisterConcern)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td class="w-25">{{ $sisterConcern->title }}</td>
                                        <td class="w-25">{{ $sisterConcern->phone }}</td>
                                        <td class="w-25"><img class="w-50" src="{{ asset($sisterConcern->banner) }}">
                                        </td>
                                        <td>
                                            @includeIf('components.buttons.edit', [
                                                'url' => route('admin.concern.edit', $sisterConcern->id),
                                            ])@includeIf('components.buttons.delete', [
                                                'url' => route('admin.concern.delete', $sisterConcern->id),
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                    No Item Found
                                @endforelse

                            </tbody>

                        </table>
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                {{ $teams->links() }}
                            </ul>
                        </nav> --}}
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
