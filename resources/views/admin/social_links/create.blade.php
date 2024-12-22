@extends('admin.layouts.main')
@section('title')
{{ __('translations.social_links-create') }}
@endsection
@section('sub-title')
{{ __('translations.social_links') }}
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.social_links-create') }}</h4>
                            <p class="card-title-desc">{{ __('translations.fill-details-to-create-social_links') }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('social_links.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.social_links-name_ar') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name_ar" required />
                                        @error('name_ar')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.social_links-name_en') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name_en" required />
                                        @error('name_en')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="link" class="form-label">{{ __('translations.social_links-icon') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="icon" name="icon" required>
                                        @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="link"
                                            class="form-label">{{ __('translations.social_links-link') }}</label>
                                        <input type="text" class="form-control" id="link" name="link">
                                        @error('link')
                                            <span class="text-danger">{{ $message }}</span>
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
