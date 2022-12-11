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

                        <div class="heading d-flex justify-content-between">
                            <h3>Edit About Section - {{ $aboutSection->title }}</h3>

                            <a href="{{ route('admin.section.index') }}" class="btn btn-warning"><i
                                    class="fas fa-long-arrow-alt-left"></i> Back</a>
                        </div>
                        <form method="POST" class="update-form"
                            action="{{ route('admin.about.update', $aboutSection->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title" class="form-label">Section Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" id="title" required
                                    value="{{ $aboutSection->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="btn-text" class="form-label">About Button Text<span class="text-danger">*</span></label>
                                    <input type="text" name="btn_text" class="form-control" id="btn-text" required
                                        value="{{ $aboutSection->btn_text }}">
                                    @error('btn_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="btn-text" class="form-label">About Button Link<span class="text-danger">*</span></label>
                                    <input type="text" name="btn_link" class="form-control" id="btn-text" required
                                        value="{{ $aboutSection->btn_link }}">
                                    @error('btn_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="image" class="form-label">About Section Image <span class="text-danger">(600px * 800px)</span></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="" alt="" class="img-fluid mt-2 rounded"
                                                    id="preview">
                                            </div>
                                            <div class="col-6">
                                                <img src="{{ asset($aboutSection->image) }}" alt=""
                                                    class="img-fluid mt-2 rounded" id="preview">
                                            </div>
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="about" class="form-label">About<span class="text-danger">*</span></label>

                                <textarea name="about" id="about" class="form-control">{{ $aboutSection?->about }}</textarea>
                                @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mission" class="form-label">Mission<span class="text-danger">*</span></label>

                                <textarea name="mission" id="mission" class="form-control">{{ $aboutSection?->mission }}</textarea>
                                @error('mission')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="vission" class="form-label">Vission<span class="text-danger">*</span></label>

                                <textarea name="vission" id="vission" class="form-control">{{ $aboutSection?->vission }}</textarea>
                                @error('vission')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="value" class="form-label">Values<span class="text-danger">*</span></label>

                                <textarea name="value" id="value" class="form-control">{{ $aboutSection?->value }}</textarea>
                                @error('value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-success submit-btn">Save</button>

                            </div>

                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#about",
            images_upload_url: "{{ route('tinymce.image.upload') }}",
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'print', 'preview', 'hr', 'media',
                'anchor', 'pagebreak ', 'wordcount', 'code', 'fullscreen',
                'save', 'table', 'contextmenu', 'directionality', 'emoticons', 'template', 'paste', 'textcolor'
            ],
            toolbar: [
                'formatselect | fontsizeselect | bold | italic | underline |  bullist | numlist | alignleft | aligncenter | alignright | alignjustify  | blockquote | link | unlink |image | table |  forecolor | removeformat | charmap | copy | cut | paste | liquickimageneheight | redo | undo | spellchecker | imageoptions | code',
            ],
            height: 400,
            branding: false,
            menubar: false,
            image_class_list: [{
                title: 'Responsive',
                value: 'img-responsive'
            }],
            mobile: {
                resize: true
            }
        });
        tinymce.init({
            selector: "#mission",
            images_upload_url: "{{ route('tinymce.image.upload') }}",
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'print', 'preview', 'hr', 'media',
                'anchor', 'pagebreak ', 'wordcount', 'code', 'fullscreen',
                'save', 'table', 'contextmenu', 'directionality', 'emoticons', 'template', 'paste', 'textcolor'
            ],
            toolbar: [
                'formatselect | fontsizeselect | bold | italic | underline |  bullist | numlist | alignleft | aligncenter | alignright | alignjustify  | blockquote | link | unlink |image | table |  forecolor | removeformat | charmap | copy | cut | paste | liquickimageneheight | redo | undo | spellchecker | imageoptions | code',
            ],
            height: 400,
            branding: false,
            menubar: false,
            image_class_list: [{
                title: 'Responsive',
                value: 'img-responsive'
            }],
            mobile: {
                resize: true
            }
        });
        tinymce.init({
            selector: "#vission",
            images_upload_url: "{{ route('tinymce.image.upload') }}",
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'print', 'preview', 'hr', 'media',
                'anchor', 'pagebreak ', 'wordcount', 'code', 'fullscreen',
                'save', 'table', 'contextmenu', 'directionality', 'emoticons', 'template', 'paste', 'textcolor'
            ],
            toolbar: [
                'formatselect | fontsizeselect | bold | italic | underline |  bullist | numlist | alignleft | aligncenter | alignright | alignjustify  | blockquote | link | unlink |image | table |  forecolor | removeformat | charmap | copy | cut | paste | liquickimageneheight | redo | undo | spellchecker | imageoptions | code',
            ],
            height: 400,
            branding: false,
            menubar: false,
            image_class_list: [{
                title: 'Responsive',
                value: 'img-responsive'
            }],
            mobile: {
                resize: true
            }
        });
        tinymce.init({
            selector: "#value",
            images_upload_url: "{{ route('tinymce.image.upload') }}",
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'print', 'preview', 'hr', 'media',
                'anchor', 'pagebreak ', 'wordcount', 'code', 'fullscreen',
                'save', 'table', 'contextmenu', 'directionality', 'emoticons', 'template', 'paste', 'textcolor'
            ],
            toolbar: [
                'formatselect | fontsizeselect | bold | italic | underline |  bullist | numlist | alignleft | aligncenter | alignright | alignjustify  | blockquote | link | unlink |image | table |  forecolor | removeformat | charmap | copy | cut | paste | liquickimageneheight | redo | undo | spellchecker | imageoptions | code',
            ],
            height: 400,
            branding: false,
            menubar: false,
            image_class_list: [{
                title: 'Responsive',
                value: 'img-responsive'
            }],
            mobile: {
                resize: true
            }
        });
    </script>

    @include('components.scripts.image-preview', ['id' => 'image', 'preview' => 'preview'])
    @include('components.scripts.image-preview', ['id' => 'logo', 'preview' => 'preview-logo'])
    @include('components.toast.success')
    @include('components.toast.error')
@endpush
