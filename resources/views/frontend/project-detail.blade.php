@extends('layouts.frontend')
@push('seo')
    @php
        $projectTitle=$project?->title ?? $title;
        $projectDescription=$project?->description ?? $description;
    @endphp
    @include('components.seo.seo',['title'=>$projectTitle,'description'=>$projectDescription,'url'=>route('frontend.project.show',$project?->id)])
@endpush
@push('css')
    <link href="{{ asset('assets/frontend/lib/lightbox/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/lib/light-slider/lightslider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white"
        style="background: url('{{ asset($project->banner) }}'); padding: 200px 0 !important; background-size: cover; background-position: center;">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-12 p-5 mt-lg-5 text-center">
                <h1 class="display-5 animated fadeIn mb-4 text-shadow">{{ $project->title }}</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase justify-content-center">
                        <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-white">Project Details</a></li>
                        <li class="breadcrumb-item text-white" aria-current="page">{{ $project->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container header bg-white">
            <div class="row">
                <div class="col-md-4">
                    <div class="row bg-primary">
                        <form action="{{ route('frontend.search') }}" method="post">
                            @csrf
                            <div class="sidebar-search-form p-4">
                                <div class="row">
                                    <div class="col-md-12 col-12">

                                        <div class="row g-2">
                                            <div class="col-12">
                                                <input type="text" class="form-control border-0 py-3"
                                                    placeholder="Search Keyword..." name="keyword">
                                            </div>
                                            <div class="col-12">
                                                <input type="text" class="form-control border-0 py-3"
                                                    placeholder="Location" name="location">
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select border-0 py-3">

                                                    <option selected>Categories</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select border-0 py-3">
                                                    <option selected>Phases</option>
                                                    @foreach ($phases as $phase)
                                                        <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-dark border-0 w-50 py-3" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="section-heading p-0 mx-2 mt-2">
                            <h3>Similiar Projects</h3>
                            <hr class="text-primary w-50" style="height: 3px;" />
                        </div>
                    </div>

                    <div class="row">

                        @forelse ($similiarProjects as $similiarProject)
                            <div class="col-12 properties my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="">
                                            <img src="{{ asset($similiarProject->banner) }}" alt=""
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <h5>
                                            <a href=""> {{ $similiarProject->title }}</a>
                                        </h5>
                                        <h6>Duration: {{ $similiarProject->duration }}</h6>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No Similiar Project Found</p>
                        @endforelse

                    </div>
                </div>
                <div class="col-md-8">

                    <!-- Project Image Carousel Start  -->

                    <div class="row overflow-hidden mb-2">
                        <div class="col-md-12 property-details">
                            <!-- Slider Item Start  -->
                            <div id="flexslider-thumb">
                                <ul class="slides">
                                    @forelse ($sliders as $slider)
                                        <li data-thumb="{{ asset($slider->url) }}">
                                            <img src="{{ asset($slider->url) }}" alt="{{ $project->title }}">
                                        </li>
                                    @empty
                                        <p>No Slider Item Found</p>
                                    @endforelse

                                </ul>

                            </div>
                            <!-- Slider Item End  -->
                        </div>
                    </div>

                    <!-- Project Image Carousel end  -->


                    <!-- Project Destails Start -->

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs justify-content-center" id="property-details-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                        data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                        aria-selected="true">Overview</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aminities-tab" data-bs-toggle="tab"
                                        data-bs-target="#aminities" type="button" role="tab" aria-controls="aminities"
                                        aria-selected="false">Projects Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="facilities-tab" data-bs-toggle="tab"
                                        data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery"
                                        aria-selected="false">Gallery</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content text-center p-3 mt-3" id="property-details-tabcontent">
                                <!-- Overview Start  -->
                                <div class="tab-pane fade show active property-overview" id="overview" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h2 class="heading-after">Project Overview</h2>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th><img src="{{ asset('assets/frontend') }}/img/icons/property-location.png"
                                                            alt="location">
                                                        Project Location</th>
                                                    <td>{{ $project->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th><img src="{{ asset('assets/frontend') }}/img/icons/property-type.png"
                                                            alt="land-size">Project
                                                        Type</th>
                                                    <td>{{ $project->type->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th><img src="{{ asset('assets/frontend') }}/img/icons/duration.png"
                                                            alt="land-size">Project
                                                        Duration</th>
                                                    <td>{{ $project->duration }}</td>
                                                </tr>
                                                <tr>
                                                    <th><img src="{{ asset('assets/frontend') }}/img/icons/start-time.png"
                                                            alt="land-size">Start Date
                                                    </th>
                                                    <td>{{ $project->start_time }}</td>
                                                </tr>
                                                <tr>
                                                    <th><img src="{{ asset('assets/frontend') }}/img/icons/end-time.png"
                                                            alt="land-size">Complete Date
                                                    </th>
                                                    <td>{{ $project->complete_time }}</td>
                                                </tr>
                                                <tr>
                                                    <th><img src="{{ asset('assets/frontend') }}/img/icons/property-appartment-size.png"
                                                            alt="land-size">Area / Size</th>
                                                    <td>{{ $project->building_size }} Square Ft</td>
                                                </tr>
                                                <tr>
                                                    <th><img src="{{ asset('assets/frontend') }}/img/icons/property-status.png"
                                                            alt="land-size">Construction Status</th>
                                                    <td>{{ $project->construction_status }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Overview End  -->

                                <!-- Aminities Start  -->
                                <div class="tab-pane fade" id="aminities" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h2 class="heading-after">Project Details</h2>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <p>{!! $project->details !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Aminities End  -->

                                <!-- Property Gallery Start  -->
                                <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row mt-3" id="gallery">
                                        <div class="col-12">
                                            <h2 class="heading-after">Photo Gallery</h2>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <div class="row g-4">
                                                @foreach ($galleries as $gallery)
                                                    <div class="col-md-3 col-sm-6 col-12">
                                                        <a href="{{ asset($gallery->url) }}" data-lightbox="image-1"
                                                            data-title="{{ $project->title }}">
                                                            <img src="{{ asset($gallery->url) }}" alt=""
                                                                class="img-fluid">
                                                        </a>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h2 class="heading-after">Photo Gallery</h2>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <div class="row g-4">
                                                @foreach ($videos as $video)
                                                    <div class="col-md-3 col-sm-6 col-12">
                                                        <iframe src="{{$video->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Property Gallery End  -->
                            </div>
                        </div>
                    </div>
                    <!-- Project Destails End -->

                    <!-- Project Location Start  -->

                    <div class="row text-center mt-3">
                        <div class="col-12">
                            <h2 class="heading-after">Project Location Map</h2>
                        </div>
                        <div class="col-12 mt-5 mb-2">
                            <iframe src="{{ $project->location_map }}" style="border:0; width: 100%;" allowfullscreen=""
                                loading="lazy" height="450" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <!-- Project Location End  -->
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/frontend/lib/lightbox/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/light-slider/lightslider.js') }}"></script>
@endpush
