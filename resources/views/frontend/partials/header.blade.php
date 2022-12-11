<!-- Topbar Start -->
<div class="container-fluid d-flex justify-content-between top-bar">
    @php
        
        $address = $settings->where('option', '=', 'office-address')->first();
        $phone1 = $settings->where('option', '=', 'phone-1')->first();
        $phone2 = $settings->where('option', '=', 'phone-2')->first();
        $email = $settings->where('option', '=', 'email')->first();
        $facebook = $settings->where('option', '=', 'facebook')->first();
        $whatsapp = $settings->where('option', '=', 'whatsapp')->first();
        $twitter = $settings->where('option', '=', 'twitter')->first();
        $instagram = $settings->where('option', '=', 'instagram')->first();
        $linedin = $settings->where('option', '=', 'linkedin')->first();
        $logo = $settings->where('option', '=', 'header-logo')->first();
    @endphp
    <div class="topbar-left">
        <a href="#" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fa fa-map-marker-alt me-2"></i></span>{{ $address->value }}
        </a>
        <a href="#" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fa fa-phone-alt me-2"></i></span>{{ $phone1->value }}
        </a>
        <a href="#" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fa fa-phone-alt me-2"></i></span>{{ $phone2->value }}
        </a>
        <a href="#" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fa fa-envelope-open me-2"></i></span>{{ $email->value }}
        </a>
    </div>
    <div class="topbar-right">
        <a href="{{ $facebook->value }}" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fab fa-facebook-f me-2"></i></span>
        </a>
        <a href="{{ $twitter->value }}" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fab fa-twitter me-2"></i></span>
        </a>
        <a href="{{ $whatsapp->value }}" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fab fa-whatsapp me-2"></i></span></a>
        <a href="{{ $instagram->value }}" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fab fa-instagram me-2"></i></span>
        </a>

        <a href="{{ $linedin->value }}" class="btn" aria-hidden="true">
            <span class="text-primary"><i class="fab fa-linkedin me-2"></i></span>
        </a>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-white">

    <nav class="navbar navbar-expand-lg navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">

            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset($logo->value) }}" style="height:45px;margin-top: 10px;"
                    alt="logo"></a>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @forelse($abouts as $about)
                            <a href="{{ route('page.show', $about->slug) }}"
                                class="dropdown-item">{{ $about->title }}</a>
                        @empty
                        @endforelse

                    </div>
                </div>
                @forelse($pages as $page)
                    <a href="{{ route('page.show', $page->slug) }}" class="nav-item nav-link">{{ $page->title }}</a>
                @empty
                @endforelse
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @forelse($services as $service)
                            <a href="{{ route('page.show', $service->slug) }}"
                                class="dropdown-item">{{ $service->title }}</a>
                        @empty
                        @endforelse

                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Factory</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @forelse($factories as $factory)
                            <a href="{{ route('page.show', $factory->slug) }}"
                                class="dropdown-item">{{ $factory->title }}</a>
                        @empty
                        @endforelse

                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">projects</a>
                    <div class="dropdown-menu rounded-0 m-0 property-submenu">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <h6>Phases</h6>
                                @foreach ($phases as $phase)
                                    <a href="{{ route('frontend.project.phase', $phase->id) }}" class="submenu-item">
                                        <span class="text-primary me-2">
                                            <i class="fas fa-caret-right"></i>
                                        </span>{{ $phase->name }}
                                    </a>
                                @endforeach

                            </div>
                            <div class="col-md-3 col-12">
                                <h6>Categories</h6>
                                @foreach ($categories as $category)
                                    <a href="{{ route('frontend.project.category', $category->id) }}"
                                        class="submenu-item">
                                        <span class="text-primary me-2">
                                            <i class="fas fa-caret-right"></i>
                                        </span>{{ $category->name }}
                                    </a>
                                @endforeach

                            </div>
                            <div class="col-md-3 col-12">
                                <h6>Location</h6>
                                @foreach ($locations as $location)
                                    <a href="{{ route('frontend.project.location', $location->id) }}"
                                        class="submenu-item">
                                        <span class="text-primary me-2">
                                            <i class="fas fa-caret-right"></i>
                                        </span>{{ $location->name }}
                                    </a>
                                @endforeach


                            </div>
                            <div class="col-md-3 col-12">
                                <h6>Types</h6>
                                @foreach ($types as $type)
                                    <a href="{{ route('frontend.project.type', $type->id) }}" class="submenu-item">
                                        <span class="text-primary me-2">
                                            <i class="fas fa-caret-right"></i>
                                        </span>{{ $type->name }}
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        target="_blank">Sister Concern</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @forelse($sisterItems as $sisterItem)
                            <a href="{{ route('concern.show', $sisterItem->slug) }}"
                                class="dropdown-item">{{ $sisterItem->title }}</a>
                        @empty
                            <a href="" class="dropdown-item">No Page Available</a>
                        @endforelse
                    </div>
                </div>

                <a href="{{ route('gallery.index') }}" class="nav-item nav-link">Gallery</a>
                <a href="{{ route('contact.index') }}" class="nav-item nav-link">Get In Touch</a>
                {{-- @if (Auth::check())
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white bg-success rounded">
                        <i class="fas fa-tachometer-alt"> </i> Dashboard
                    </a>

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="nav-link text-white bg-primary rounded"><i class="fas fa-power-off"></i> Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link text-white bg-primary rounded">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                @endif --}}

            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
