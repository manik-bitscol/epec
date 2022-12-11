@extends('layouts.frontend')
@push('seo')
    @php
        $sisterTitle=$sisterConcern->title ?? $title;
        $sisterDescription=$sisterConcern->description ?? $description;
    @endphp
    @include('components.seo.seo',['title'=>$sisterTitle,'description'=>$sisterDescription,'url'=>route('concern.show',$sisterConcern?->slug)])
@endpush
@section('content')
    <div class="container-fluid header bg-white"
        style="background-image: url('{{ asset($sisterConcern?->banner) }}'); padding: 300px 0 150px !important;">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-12 p-5 mt-lg-5 text-center">
                <h1 class="display-5 animated fadeIn mb-4 text-shadow">{{ $sisterConcern->title }}
                </h1>
                {{-- <h3 class="animated fadeIn mb-4 text-shadow">{{ $page?->sub_title }}</h3> --}}
            </div>
        </div>
    </div>

    <!-- About Agro & Fisheries Start  -->
    <div class="container-xxl about-agro py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($sisterConcern->image->url) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2>{{ $sisterConcern->title }}</h2>
                    <p>Address: {{ $sisterConcern->address }}</p>
                    <p>Phone: {{ $sisterConcern->phone }}</p>
                    <p>Email: {{ $sisterConcern->email }}</p>
                    <div class="d-flex pt-2">
                        <a class="btn socail-btn-outline btn-social" href="{{ $sisterConcern?->twitter }}"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn socail-btn-outline btn-social" href="{{ $sisterConcern?->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn socail-btn-outline btn-social" href="{{ $sisterConcern?->whatsapp }}"><i
                                class="fab fa-whatsapp"></i></a>
                        <a class="btn socail-btn-outline btn-social" href="{{ $sisterConcern?->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="section-divider"></div>
            <div class="row mt-3">
                {!! $sisterConcern->description !!}
            </div>


        </div>
    </div>
    <!-- About Agro & Fisheries End  -->
@endsection
