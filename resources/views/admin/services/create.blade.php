@extends('admin.layouts.main')
@section('title') {{ __('translations.Services') }} @endsection
@section('sub-title') {{ __('translations.Services') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.services-create') }}</h4>
                            <p class="card-title-desc">{{ __('translations.fill-details-to-create-service') }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name_ar" class="form-label">{{ __('translations.services-name_ar') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                                        @error('name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name_en" class="form-label">{{ __('translations.services-name_en') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" required>
                                        @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Description AR / EN -->
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.services-description_ar') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description_ar" required></textarea>
                                        @error('description_ar')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.services-description_en') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description_en" required></textarea>
                                        @error('description_en')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="icon" class="form-label">{{ __('translations.services-icon') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="icon" name="icon" required placeholder="ti-package">
                                        @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Image -->
                                    <div class="col-lg-12 mb-5">
                                        <label class="form-label">{{ __('translations.services-image') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image" accept="image/*"
                                            required>
                                        @error('image')
                                            <span class="text-danger text-bold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('translations.create') }} <i class="fas fa-check ms-1"></i>
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
