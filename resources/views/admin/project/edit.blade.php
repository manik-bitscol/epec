@extends('layouts.admin')
@push('css')
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="heading d-flex justify-content-between">
                    <h3>Edit Project - {{ $project->title }}</h3>

                    <a href="{{ route('admin.project.edit.gallery', $project->id) }}" class="btn btn-warning"><i
                            class="fas fa-edit"></i> Edit
                        Images</a>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.project.update', $project->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="category-id" class="form-label">Categories<span
                                                        class="text-danger">*</span></label>
                                                <select name="category_id" class="form-control text-capitalize"
                                                    id="category-id" value="{{ old('category_id') }}">
                                                    <option value="">--Select One--</option>
                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $project->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @empty
                                                        No Category Found
                                                    @endforelse

                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="category" data-toggle="modal" data-target="#add-category"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                                Category</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="type-id" class="form-label">Project Type<span
                                                        class="text-danger">*</span> </label>
                                                <select name="type_id" class="form-control text-capitalize" id="type-id"
                                                    value="{{ old('type_id') }}">
                                                    <option value="">--Select One--</option>
                                                    @forelse ($types as $type)
                                                        <option value="{{ $type->id }}"
                                                            {{ $project->type_id == $type->id ? 'selected' : '' }}>
                                                            {{ $type->name }}</option>
                                                    @empty
                                                        No Project Type Found
                                                    @endforelse

                                                </select>
                                                @error('type_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="type" data-toggle="modal" data-target="#add-type"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                                Project Type</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="phase-id" class="form-label">Phases<span
                                                        class="text-danger">*</span></label>
                                                <select name="phase_id" class="form-control text-capitalize" id="phase-id"
                                                    value="{{ old('phase_id') }}">
                                                    <option value="">--Select One--</option>
                                                    @forelse ($phases as $phase)
                                                        <option
                                                            value="{{ $phase->id }}"{{ $project->phase_id == $phase->id ? ' selected' : '' }}>
                                                            {{ $phase->name }}</option>
                                                    @empty
                                                        No Phases Found
                                                    @endforelse

                                                </select>
                                                @error('phase_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="phase" data-toggle="modal" data-target="#add-phase"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i> Add
                                                Phase</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="form-group">
                                                <label for="location-id" class="form-label">Location<span
                                                        class="text-danger">*</span></label>
                                                <select name="location_id" class="form-control text-capitalize"
                                                    id="location-id" value="{{ old('location_id') }}">
                                                    <option value=""> --Select One--</option>
                                                    @forelse ($locations as $location)
                                                        <option value="{{ $location->id }}"
                                                            {{ $project->location_id == $location->id ? ' selected' : '' }}>
                                                            {{ $location->name }}</option>
                                                    @empty
                                                        No Location Found
                                                    @endforelse

                                                </select>
                                                @error('location_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 mt-4">
                                            <button id="location" data-toggle="modal" data-target="#add-location"
                                                class="btn btn-success mt-2" type="button"> <i class="fas fa-plus"></i>
                                                Add
                                                Location</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Project Title<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Enter Project Title" id="title"
                                            value="{{ $project->title }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="location_map" class="form-label">Project Location Map<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="location_map"
                                            placeholder="Enter Project Location Map Address" id="location_map"
                                            value="{{ $project->location_map }}">
                                        @error('location_map')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Project Address<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter Project Address" id="address"
                                            value="{{ $project->address }}">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duration" class="form-label">Construction Duration<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="duration" id="duration"
                                            placeholder="Construction Duration" value="{{ $project->duration }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Start Date<span class="text-danger">*</span></label>
                                        <div class="input-group date" id="start_date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#start_date" name="start_time"
                                                value="{{ $project->start_time }}">
                                            <div class="input-group-append" data-target="#start_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Complete Date<span class="text-danger">*</span></label>
                                        <div class="input-group date" id="end_date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#end_date" name="complete_time"
                                                value="{{ $project->complete_time }}">
                                            <div class="input-group-append" data-target="#end_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="building-size" class="form-label">Building Size (SFT)<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="building_size"
                                            placeholder="Enter Building Size" id="building-size"
                                            value="{{ $project->building_size }}">
                                        @error('building_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="construction-status" class="form-label">Construction Status<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="construction_status"
                                            placeholder="Enter Construction Status" id="construction-status"
                                            value="{{ $project->construction_status }}">
                                        @error('construction_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <textarea name="details" id="details" class="form-control">{{ $project->details }}</textarea>

                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @includeIf('components.buttons.submit', [
                                    'text' => 'Update',
                                    'id' => 'add-team',
                                ])
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.store') }}" method="post" id="name-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name" class="form-label">Category<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="Enter Category" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @include('components.buttons.submit', [
                                'text' => 'Save',
                                'id' => 'category-store',
                            ])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Project Type Modal -->
    <div class="modal fade" id="add-type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Project Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.type.store') }}" method="post" id="type-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name" class="form-label">Project Type<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="Enter Project Type" id="name" value="{{ old('name') }}">
                            @error('name')
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
    <!-- Add Phase Modal -->
    <div class="modal fade" id="add-phase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Phase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.phase.store') }}" method="post" id="role-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name" class="form-label">Phase<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required placeholder="Enter Phase"
                                id="name" value="{{ old('name') }}">
                            @error('name')
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
    <!-- Add Location Modal -->
    <div class="modal fade" id="add-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.location.store') }}" method="post" id="location-store-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="Enter Location" id="location" value="{{ old('location') }}">
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @include('components.buttons.submit', [
                                'text' => 'Save',
                                'id' => 'location-store',
                            ])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>

    <script src="{{ asset('assets/backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    @include('components.toast.error')
    @include('components.toast.success')

    @include('components.tinymce.tinymce', [
        'selector' => 'details',
    ])


    <script>
        $('#start_date').datetimepicker({
            format: 'L'
        });
        $('#end_date').datetimepicker({
            format: 'L'
        });
    </script>
@endpush
