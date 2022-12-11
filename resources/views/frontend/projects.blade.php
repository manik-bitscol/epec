@extends('layouts.frontend')
@push('seo')
    @include('components.seo.seo',['title'=>$title,'description'=>$description,'url'=>route('frontend.projects')])
@endpush
@section('content')
    <!-- Property List Start -->
    <div class="container-xxl py-5 products overflow-hidden">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Our Projects</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex mb-5" id="controls-1">
                        <li class="nav-item me-2">

                            <button type="button" class="btn btn-outline-primary active" data-filter="all">All</button>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item me-2">
                                <button type="button" class="btn btn-outline-primary"
                                    data-filter=".grid-{{ $category->name }}">{{ $category->name }}</button>
                            </li>
                        @endforeach


                    </ul>
                    <ul class="nav nav-pills d-inline-flex mb-5 d-none" id="controls-2">
                        <li class="nav-item me-2">

                            <button type="button" class="btn btn-outline-primary active" data-filter="all">All</button>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item me-2">
                                <button type="button" class="btn btn-outline-primary"
                                    data-filter=".list-{{ $category->name }}">{{ $category->name }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="seach-box mb-3">
                <div class="row">
                    <div class="col-10">
                        <form action="{{ route('frontend.search') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Keyword....." name="keyword">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Location" name="location">
                                </div>
                                <div class="col-md-2">
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="phase" id="phase" class="form-control">
                                        @foreach ($phases as $phase)
                                            <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <div class="text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                            <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#grid"
                                        id="grid-active-btn"><i class="fas fa-th"></i></a>
                                </li>
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#list"
                                        id="list-active-btn"><i class="fas fa-list"></i></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="grid" class="tab-pane fade show p-0 active">

                    <div class="row g-4 grid-mixitup" id="grid-mixitup">
                        @forelse ($projects as $project)
                            @include('components.project.project-grid', ['project' => $project])
                        @empty
                            <p>Project Not Found</p>
                        @endforelse

                    </div>
                </div>
                <div id="list" class="tab-pane fade show p-0">

                    <div class="row g-4 list-mixitup" id="list-mixitup">
                        @forelse ($projects as $project)
                            @include('components.project.project-list', ['project' => $project])
                        @empty
                            <p>Project Not Found</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection
@push('js')
    <script src="{{ asset('assets/frontend/lib/mixitup/mixitup.min.js') }}"></script>
    <script>
        // Mix It Up Plugin 
        var mixer = mixitup("#grid-mixitup");
        var mixer = mixitup("#list-mixitup");
    </script>
@endpush
