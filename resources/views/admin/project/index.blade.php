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
                    <h3>Project List</h3>
                    <a href="{{ route('admin.project.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add
                        New</a>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>{{ $projects->firstItem() + $loop->index }}</td>
                                        <td class="w-25">{{ $project->title }}</td>
                                        <td class="w-25">{{ $project->address }}</td>
                                        <td class="w-25"><img class="w-50" src="{{ asset($project->banner) }}"
                                                alt="">
                                        </td>
                                        <td>
                                            @includeIf('components.buttons.edit', [
                                                'url' => route('admin.project.edit', $project->id),
                                            ])
                                            @includeIf('components.buttons.image-edit', [
                                                'url' =>route('admin.project.edit.gallery', $project->id),
                                            ])
                                            @includeIf('components.buttons.delete', [
                                                'url' => route('admin.project.delete', $project->id),
                                            ])
                                            <a href="{{ route('admin.project.edit.gallery', $project->id) }}" id="edit-btn"
                                                class="btn btn-warning" title="Edit Gallery" style="color: #fff;">
                                                <i class="fa fa-pen-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    No Item Found
                                @endforelse

                            </tbody>

                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                {{ $projects->links() }}
                            </ul>
                        </nav>
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
