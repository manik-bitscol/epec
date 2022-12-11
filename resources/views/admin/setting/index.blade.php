@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <div class="container">

        <div class="row mt-3">
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">

                        <h5>Header Logo<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.setting.logo') }}">
                            @csrf
                            @method('PATCH')

                            <div class="d-flex my-2">

                                <img src="{{ asset($logo->value) }}" alt="" id="img-preview" class="img-preview"
                                    style="width: 80px;">
                                <input type="hidden" name="old_logo" value="{{ $logo->value }}">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label image-label p-2">
                                    <span class="form-label">Choose Image (230px*50px)</span>
                                    <input type="file" name="image" class="form-control d-none" id="image">
                                </label>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Footer Logo<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.setting.footer.logo') }}">
                            @csrf
                            @method('PATCH')

                            <div class="d-flex my-2">
                                <input type="hidden" name="old_logo" value="{{ $footerLogo->value }}">
                                <img src="{{ asset($footerLogo->value) }}" alt="" id="footer-preview"
                                    class="img-preview" style="width: 80px;">
                            </div>
                            <div class="form-group">
                                <label for="footer-logo" class="form-label image-label p-2">
                                    <span class="form-label">Choose Image (230px*50px)</span>
                                    <input type="file" name="image" class="form-control d-none" id="footer-logo">
                                </label>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Favicon<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.setting.favicon') }}">
                            @csrf
                            @method('PATCH')

                            <div class="d-flex my-2">
                                <input type="hidden" name="old_logo" value="{{ $favicon?->value }}">
                                <img src="{{ asset($favicon?->value) }}" alt="" id="favicon-preview"
                                    class="img-preview" style="width: 80px;">
                            </div>
                            <div class="form-group">
                                <label for="favicon" class="form-label image-label p-2">
                                    <span class="form-label">Choose Image</span>
                                    <input type="file" name="image" class="form-control d-none" id="favicon">
                                </label>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Office Address<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.address') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="address" id="address" value="{{ $officeAddress->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Office Phone One<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.phone.first') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="phone_1" id="address" value="{{ $phone1->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Office Phone Two<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.phone.second') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="phone_2" id="phone-2" value="{{ $phone2->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Office Email Address<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.email') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="email" id="email" value="{{ $email->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Office Facebook Page<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.facebook') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="facebook" id="facebook" value="{{ $facebook->value }}"
                                    class="form-control">
                            </div>
                            @error('facebook')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Twitter Account<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.twitter') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="twitter" id="twitter" value="{{ $whatsapp->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Whats App<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.whatsapp') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="whatsapp" id="whatsapp" value="{{ $whatsapp->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Instagram Account<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.instagram') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="instagram" id="instagram" value="{{ $instagram->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Office LinkedIn<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.linkedin') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="linkedin" id="linkedin" value="{{ $linkedin->value }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Seo Title<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.footer.seoTitle') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="seo_title" id="copy-text"
                                    value="{{ $seoTitle->value }}" class="form-control">
                            </div>


                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Seo Keywords<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.footer.seoKeyword') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="meta_keyword" id="copy-text"
                                    value="{{ $seoKeyword->value }}" class="form-control">
                            </div>


                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Seo Description<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.footer.seoDescription') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="meta_description" id="copy-text"
                                    value="{{ $seoDescription->value }}" class="form-control">
                            </div>


                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Google Location Map<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.footer.copyText') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="google_location" id="copy-text"
                                    value="{{ $locationMap->value }}" class="form-control">
                            </div>


                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Mail Receiving Address<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.sender') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="sender_mail" id="sender-mail" value="{{ $gmail->value }}"
                                    class="form-control">
                            </div>


                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            <!--<div class="col-md-4 col-6">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header">-->
            <!--            <h5>Mail Sender Password<span class="text-danger">*</span></h5>-->
            <!--        </div>-->
            <!--        <div class="card-body">-->
            <!--            <form method="POST" action="{{ route('admin.setting.sender.password') }}">-->
            <!--                @csrf-->
            <!--                @method('PATCH')-->

            <!--                <div class="form-group">-->

            <!--                    <input type="text" name="sender_password" id="sender-password"-->
            <!--                        value="{{ $password->value }}" class="form-control">-->
            <!--                </div>-->


            <!--                <div class="form-group">-->
            <!--                    @includeIf('components.buttons.submit', ['text' => 'Update'])-->

            <!--                </div>-->

            <!--            </form>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Copy Right Text<span class="text-danger">*</span></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.footer.copyText') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <input type="text" name="copy_right_text" id="copy-text"
                                    value="{{ $copyRight->value }}" class="form-control">
                            </div>


                            <div class="form-group">
                                @includeIf('components.buttons.submit', ['text' => 'Update'])

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
    <script src="{{ asset('assets/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @include('components.scripts.image-preview', ['id' => 'image', 'preview' => 'img-preview'])
    @include('components.scripts.image-preview', [
        'id' => 'footer-logo',
        'preview' => 'footer-preview',
    ])
    @include('components.scripts.image-preview', [
        'id' => 'favicon',
        'preview' => 'favicon-preview',
    ])
    @include('components.toast.success')
    @include('components.toast.error')
@endpush
