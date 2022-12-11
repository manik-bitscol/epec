<!-- Footer Start -->
@php
    $address = $settings->where('option', '=', 'office-address')->first();
    $phone1 = $settings->where('option', '=', 'phone-1')->first();
    $phone2 = $settings->where('option', '=', 'phone-2')->first();
    $email = $settings->where('option', '=', 'email')->first();
    $facebook = $settings->where('option', '=', 'facebook')->first();
    $whatsapp = $settings->where('option', '=', 'whatsapp')->first();
    $twitter = $settings->where('option', '=', 'twitter')->first();
    $instagram = $settings->where('option', '=', 'instagram')->first();
    $linkedin = $settings->where('option', '=', 'linkedin')->first();
    $logo = $settings->where('option', '=', 'footer-logo')->first();
    $copyRight = $settings->where('option', '=', 'copy-right-text')->first();
    $locationMap = $settings->where('option', '=', 'google-location')->first();
@endphp
<div class="container-fluid bg-dark text-white-50 footer pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <img src="{{ asset($logo->value) }}" style="width:150px; margin-bottom: 10px; margin-left:-15px;"
                    alt="logo"></a>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $address->value }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $phone1->value }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $email->value }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{ $facebook->value }}">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" href="{{ $twitter->value }}">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" href="{{ $whatsapp->value }}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" href="{{ $instagram->value }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" href="{{ $linkedin->value }}">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Head Office Location</h5>
                
                <iframe src="{{$locationMap->value}}" frameborder="0" style="width:100%;height:auto;"></iframe>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Hotline Numbers</h5>
                @forelse ($contacts as $contact)
                    <a class="btn text-white-50 btn-link" href="#">Hotline -{{ $loop->index + 1 }}
                        {{ $contact->phone_number }}</a>
                @empty

                    <a class="btn text-white-50 btn-link" href="#">No Contact Found</a>
                @endforelse

            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                @forelse ($items as $page)
                    <a class="btn btn-link text-white-50"
                        href="{{ route('page.show', $page->slug) }}">{{ $page->title }}</a>
                @empty

                    <a class="btn btn-link text-white-50" href="">No Page Found</a>
                @endforelse

            </div>
            
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    {!! $copyRight->value !!}
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Developed & Maintain By
                    <a class="border-bottom" href="https://bitscol.com">BITSCOL</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
