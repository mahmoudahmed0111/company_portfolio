@extends('admin.layouts.main')
@section('title') {{ __('translations.Settings') }} @endsection
@section('sub-title') {{ __('translations.Settings') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.settings-details') }}</h4>
                            <p class="card-title-desc">{{ __('translations.update-settings-details') }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">{{ __('translations.settings-name_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar"
                                            value="{{ $setting->translate('ar')->name }}" required>
                                        @error('name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">{{ __('translations.settings-name_en') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name_en" name="name_en"
                                            value="{{ $setting->translate('en')->name }}" required>
                                        @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="email"
                                            class="form-label">{{ __('translations.settings-email') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $setting->email }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="address"
                                            class="form-label">{{ __('translations.settings-address_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address_ar" name="address_ar"
                                            value="{{ $setting->translate('ar')->address }}" required>
                                        @error('address_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="address"
                                            class="form-label">{{ __('translations.settings-address_en') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address_en" name="address_en"
                                            value="{{ $setting->translate('en')->address }}" required>
                                        @error('address_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone1"
                                            class="form-label">{{ __('translations.settings-phone1') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone1" name="phone1"
                                            value="{{ $setting->phone1 }}" required>
                                        @error('phone1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone2"
                                            class="form-label">{{ __('translations.settings-phone2') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone2" name="phone2"
                                            value="{{ $setting->phone2 }}" required>
                                        @error('phone2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.settings-description_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="description_ar" name="description_ar" class="form-control" rows="5" required>{{ $setting->translate('ar')->description }}</textarea>
                                        @error('description_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.settings-description_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="description_en" name="description_en" class="form-control" rows="5" required>{{ $setting->translate('en')->description }}</textarea>
                                        @error('description_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="btn-upload btn btn-primary mt-3"
                                            for="logo">{{ __('translations.settings-logo') }}</label>
                                        <div
                                            class="preview-box d-block justify-content-center rounded border-dashed border-theme-color overflow-hidden p-3">
                                            @if ($setting->logo)
                                                <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo"
                                                    style="max-width: 100px; height: auto;">
                                            @endif
                                        </div>
                                        <input type="file" id="logo" name="logo" accept="image/*" hidden />
                                        @error('logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> 
                                </div>

                                <div class="d-flex justify-content-end">

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('translations.edit') }} <i class="fa fa-check" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
