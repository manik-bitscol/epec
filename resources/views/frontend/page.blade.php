@extends('layouts.frontend')
@push('seo')
    @php
        $pageTitle=$page?->title ?? $title;
        $pageDescription=$page?->description ?? $description;
    @endphp
    
    @include('components.seo.seo',['title'=>$pageTitle,'description'=>$pageDescription,'url'=>route('page.show',$page?->slug)])
@endpush
@section('content')
    <div class="container-fluid header bg-white"
        style="background-image: url('{{ asset($page?->image?->url) }}'); padding: 300px 0 150px !important;">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-12 p-5 mt-lg-5 text-center">
                <h1 class="display-5 animated fadeIn mb-4 text-shadow">{{ $page?->title }}
                </h1>
                <h3 class="animated fadeIn mb-4 text-shadow">{{ $page?->sub_title }}</h3>
            </div>
        </div>
    </div>

    <div class="container-xxl about-agro py-5">
        <div class="container">
            {!! $page?->description !!}
        </div>
    </div>
@endsection
