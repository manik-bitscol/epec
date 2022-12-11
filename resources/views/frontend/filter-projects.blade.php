@extends('layouts.frontend')
@push('seo')
    @include('components.seo.seo',['title'=>$title,'description'=>$description,'url'=>request()->getHost()])
@endpush
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-white p-0">
        <div class="container">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-12 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">{{ $meta->name }}</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('frontend.projects') }}">Projects</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">{{ $meta->name }}</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Property List Start -->
    <div class="container-xxl py-5 products overflow-hidden">
        <div class="container">
            <div class="row g-4 grid-mixitup" id="grid-mixitup">
                @forelse ($projects as $project)
                    @include('components.project.project-grid', ['project' => $project])
                @empty
                    <p>Project Not Found</p>
                @endforelse
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $projects->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection
