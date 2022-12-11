@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">

                        <h3>Home Page Sections</h3>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Section Title</th>
                                    <th>Section Sub Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $start = 0;
                                @endphp
                                <tr>
                                    <td>{{ ++$start }}</td>
                                    <td class="text-capitalize">{{ $aboutSection->title }}</td>
                                    <td class="text-capitalize">{{ $aboutSection?->sub_title ?? '--' }}</td>
                                    <td>
                                        @include('components.buttons.edit', [
                                            'url' => route('admin.about.edit', $aboutSection->id),
                                        ])

                                    </td>
                                </tr>
                                @forelse ($sections as $section)
                                    <tr>
                                        <td>{{ ++$start }}</td>
                                        <td class="text-capitalize">{{ $section->title }}</td>
                                        <td class="text-capitalize">{{ $section->sub_title ?? '--' }}</td>
                                        <td>
                                            @include('components.buttons.edit', [
                                                'url' => route('admin.section.edit', $section->id),
                                            ])

                                        </td>
                                    </tr>
                                @empty
                                    No Section Found
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>

    @include('components.tinymce.tinymce', ['selector' => 'description'])
    @include('components.toast.success')
    @include('components.toast.error')
@endpush
