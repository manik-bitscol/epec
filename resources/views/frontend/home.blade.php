@extends('layouts.frontend')
@push('seo')
    @include('components.seo.seo',['title'=>$title,'description'=>$description,'url'=>request()->getHost()])
@endpush
@push('css')
    <link href="{{ asset('assets/frontend') }}//lib/lightbox/lightbox.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}//lib/slick/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}//lib/slick/slick.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Slider Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-12 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    @forelse ($sliders as $slider)
                        <div class="owl-carousel-item py-5 text-center item-carousel"
                            style="background-image: url({{ asset($slider->image->url) }});">
                            <div class="carousel-content py-5 my-5">
                                <div class="slider-text p-3 mx-2 my-2">
                                    <h1 class="display-5 animated fadeIn mb-4 mt-5 text-shadow text-primary">{{ $slider->title }}</h1>
                                    <p class="animated fadeIn mb-4 pb-2 text-white">{{ $slider->sub_title }}</p>
                                </div>
                                <a href="{{ $slider->btn_link }}"
                                    class="btn btn-primary py-3 px-5 me-3 animated fadeIn">{{ $slider->btn_text }}</a>
                            </div>
                        </div>
                    @empty
                        No Slider Item Found
                    @endforelse

                </div>
            </div>
        </div>

    </div>
    <!-- Slider End -->

    <!-- About Start -->
    <div class="container-xxl py-5 bg-secondary-light about-section">
        <div class="container">
            <div class="row gx-4">
                
                <div class="col-md-6 wow fadeIn text-center" data-wow-delay="0.1s">
                    <img src="{{ asset($aboutSection?->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <h2 class="mb-2"><span class="text-white">{{ $aboutSection?->title }}</span></h2>

                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item rounded" role="presentation">
                            <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about"
                                type="button" role="tab" aria-controls="about" aria-selected="true">About</button>
                        </li>
                        <li class="nav-item rounded" role="presentation">
                            <button class="nav-link" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission"
                                type="button" role="tab" aria-controls="mission" aria-selected="false">Mission</button>
                        </li>
                        <li class="nav-item  rounded" role="presentation">
                            <button class="nav-link" id="vission-tab" data-bs-toggle="tab" data-bs-target="#vission"
                                type="button" role="tab" aria-controls="vission" aria-selected="false">Vission</button>
                        </li>
                        <li class="nav-item rounded" role="presentation">
                            <button class="nav-link" id="value-tab" data-bs-toggle="tab" data-bs-target="#value"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Value</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active mt-3 px-2" id="about" role="tabpanel" aria-labelledby="about-tab">{!!$aboutSection?->about!!}
                        </div>
                        <div class="tab-pane fade mt-3 px-2" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                            {!!$aboutSection?->mission!!}
                        </div>
                        <div class="tab-pane fade mt-3 px-2" id="vission" role="tabpanel" aria-labelledby="vission-tab">
                            {!!$aboutSection?->vission!!}
                        </div>
                        <div class="tab-pane fade mt-3 text-white px-2" id="value" role="tabpanel" aria-labelledby="value-tab">
                            {!!$aboutSection?->value!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 heading-after">{{ $serviceSection?->title }}</h1>
                <p class="mt-5">{!! $serviceSection?->description !!}</p>
            </div>
            <div class="row g-4">
                @forelse ($services as $service)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{ asset($service->icon) }}" alt="Icon">
                                </div>
                                <h6 class="text-capitalize">{{ $service->name }}</h6>
                            </div>
                        </a>
                    </div>
                @empty
                    No Service Available
                @endforelse

            </div>
        </div>
    </div>
    <!-- Service End -->
    
    <!-- Award Section Start-->
    @include('frontend.partials.awards')
    <!-- Award Section End -->
    
    <!-- Why Choose Us Start -->
    <div class="container-xxl py-5 why-epec">
        <div class="container">
            <div class="row align-items-center bg-dark why-epec-row">
                <div class="col-lg-6 wow fadeIn px-0" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100 rounded" src="{{ asset($strengthSection?->image) }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn text-white px-0" data-wow-delay="0.5s">
                    <div class="px-5">
                        <h1 class="mb-4 text-white">{{ $strengthSection?->title }}</h1>
                        <p class="mb-4 fa-2x">{{ $strengthSection?->sub_title }}</p>
                        <p>{!! $strengthSection?->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us End -->


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
                        <form action="{{route('frontend.search')}}" method="post">
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
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="phase" id="phase" class="form-control">
                                        @foreach ($phases as $phase)
                                        <option value="{{$phase->id}}">{{$phase->name}}</option>
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
            <div class="tab-content text-center">
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-3">
                        {{ $projects->links() }}
                    </ul>
                </nav>
                <a href="{{route('frontend.projects')}}" class="btn btn-success text-center">See All</a>
            </div>
        </div>
    </div>
    <!-- Property List End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 heading-after">Team Behind Your Dream</h1>

            </div>
            <div class="owl-carousel team-carousel">

                @forelse ($teams as $team)
                    <div class="wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img src="{{ $team->image->url }}" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href="{{ $team->facebook_account }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href="{{ $team->twitter_account }}"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href="{{ $team->instagram_account }}"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center px-2 py-4 mt-3">
                                <h5 class="fw-bold mb-0">{{ $team->name }}</h5>
                                <small>{{ $team->designation }}</small>
                            </div>
                        </div>
                    </div>

                @empty
                    No Team Member Found
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Would You Like Start -->
    <div class="contact-section position-relative">
        <div class="google-map">
            <iframe src="{{$locationMap->value}}" frameborder="0" style="width: 100%;height: 250px;"></iframe>
            <!-- You can even embed a Google Form here -->
        </div>
        <div class="get-in-touch-text position-absolute top-0 left-0 d-flex align-items-center justify-content-center" style="width: 100%;height: 250px; background:rgba(25, 102, 178, .4)">
            <h2 class="text-white"> Get In Touch</h2>
        </div>
    </div>
    <!-- Would You Like End  -->

    <!-- Would You Like Start -->
    <div class="container-xxl py-5 bg-secondary-light" style="margin-top: -20px;">
        <div class="container overflow-hidden">
            
            <div class="row justify-content-center align-items-center gx-5">
                <div class="col-md-6 col-12">
                    @includeIf('components.contact.contact')
                </div>
                <div class="col-md-6 col-12 home-contact">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row g-3">
                                <div class="col-md-12 mt-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                                            name="name">
                                        <label for="name">Your Name</label>
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                                            name="email">
                                        <label for="email">Your Email</label>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone" placeholder="Your Phone"
                                            name="phone">
                                        <label for="phone">Your Phone Number</label>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-12 mt-1">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px" name="message"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-1">
                                    <button class="btn contact-btn w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Would You Like End  -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="mb-3">What Our Clients Say!</h1>
        
                    </div>
                    <div class="testimonial-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                        @forelse ($testimonials as $testimonial)
                            <div class="testimonial-item bg-light rounded p-3 mx-1">
                                <div class="bg-white border rounded p-4">
                                    <p>{{ $testimonial->testimonial }}</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded"
                                            src="{{ asset($testimonial?->image?->url) }}" style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6 class="fw-bold mb-1">{{ $testimonial->name }}</h6>
                                            <small>{{ $testimonial->profession }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No Data Found
                        @endforelse
        
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="mb-3">Our Valuable Clients!</h1>
        
                    </div>
                    <div class="slick">
                        @forelse ($clients as $client)
                        <div class="">
                            <div class="d-flex align-items-center justify-content-center border">
                                <a href="{{ asset($client?->image) }}" data-lightbox="{{ $client->id }}"
                                    data-title="{{ $client?->title }}">
                                    <img class="img-fluid flex-shrink-0" src="{{ asset($client?->image) }}">
                                </a>

                            </div>
                        </div>
                    @empty
                        No Data Found
                    @endforelse
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Testimonial End -->
    
@endsection
@push('js')
    <script src="{{ asset('assets/frontend/lib/mixitup/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/lightbox/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/masonry/masonry.pkgd.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.slick').slick({
                rows:2,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                speed: 300,
                autoplay: true,
            })
        });
        $('.grid-mixitup').masonry();
        $('.grid-mixitup').masonry();
        @if(session()->has('success'))
            alert("{{ session('success') }}")
        @endif 
        var mixer = mixitup("#grid-mixitup");
        var mixer = mixitup("#list-mixitup");
        
    </script>
@endpush
