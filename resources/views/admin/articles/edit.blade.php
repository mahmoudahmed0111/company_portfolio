@extends('admin.layouts.main')
@section('title') {{ __('translations.Articles') }} @endsection
@section('sub-title') {{ __('translations.Articles') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.users-edit') }}</h4>
                            <p class="card-title-desc">{{ __('translations.update-user-details') }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('articles.update', $article->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Name AR -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name_ar" class="form-label">{{ __('translations.articles-name_ar') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar"
                                            value="{{ old('name_ar', $article->translate('ar')->name) }}" required>
                                        @error('name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Name EN -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name_en" class="form-label">{{ __('translations.articles-name_en') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_en" name="name_en"
                                            value="{{ old('name_en', $article->translate('en')->name) }}" required>
                                        @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Description AR -->
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.articles-description_ar') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description_ar" required>{{ old('description_ar', $article->translate('ar')->description) }}</textarea>
                                        @error('description_ar')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Description EN -->
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.articles-description_en') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description_en" required>{{ old('description_en', $article->translate('en')->description) }}</textarea>
                                        @error('description_en')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Image -->
                                    <div class="col-lg-12 mb-5">
                                        <label class="form-label">{{ __('translations.articles-image') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                        <div class="mt-2">
                                            <img src="{{ asset('uploads/articles/' . $article->image) }}"
                                                alt="article Image" class="img-thumbnail" width="150">
                                        </div>
                                        @error('image')
                                            <span class="text-danger text-bold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('translations.update') }} <i class="fas fa-save ms-1"></i>
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
