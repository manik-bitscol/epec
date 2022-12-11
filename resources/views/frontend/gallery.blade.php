@extends('layouts.frontend')
@push('seo')
    @include('components.seo.seo',['title'=>$title,'description'=>$description,'url'=>route('gallery.index')])
@endpush
@push('css')
    <link href="{{ asset('assets/frontend') }}/lib/lightbox/lightbox.min.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Property Gallery Start  -->
    <div class="container-fluid wow fadeIn text-center bg-light p-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Photo Gallery</h1>
                </div>
                <div class="col-12">
                    <div class="row g-4">

                        @forelse ($galleries as $gallery)
                            <div class="col-md-3">
                                <a href="{{ asset($gallery->image->url) }}" data-lightbox="{{ $gallery->id }}"
                                    data-title="{{ $gallery->name }}">
                                    <img src="{{ asset($gallery->image->url) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                        @empty
                            <div class="col-md-3">
                                No Gallery Found
                            </div>
                        @endforelse
                        @if ($images)
                            @foreach ($images as $image)
                                <div class="col-md-3">
                                    <a href="{{ asset($image?->url) }}" data-lightbox="{{ $image->id }}"
                                        data-title="{{ $image?->name }}">
                                        <img src="{{ asset($image?->url) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                            @endforeach
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{ $images->links() }}
                                </ul>
                            </nav>
                        @endif

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>Video Gallery</h1>
                </div>
                <div class="col-12">
                    <div class="row g-4">

                        @forelse ($videos as $video)
                            <div class="col-md-4 col-sm-6">
                                <iframe class="video-gallery-item" src="{{ asset($video?->url) }}"></iframe>

                            </div>
                        @empty
                            <div class="col-md-3">
                                No Video Gallery Found
                            </div>
                        @endforelse
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $videos->links() }}
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Gallery End  -->
@endsection
@push('js')
    <script src="{{ asset('assets/frontend') }}/lib/lightbox/lightbox.min.js"></script>
@endpush
