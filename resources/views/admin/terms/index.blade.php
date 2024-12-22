@extends('admin.layouts.main')
@section('title')
    {{ __('translations.Terms') }}
@endsection
@section('sub-title')
    {{ __('translations.Terms') }}
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.terms-details') }}</h4>
                            <p class="card-title-desc">{{ __('translations.update-terms-details') }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('terms.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term1_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term1_ar" name="term1_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term1 }}</textarea>
                                        @error('term1_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term1_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term1_en" name="term1_en" class="form-control" rows="5" required>{{ $term->translate('en')->term1 }}</textarea>
                                        @error('term1_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term2_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term2_ar" name="term2_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term2 }}</textarea>
                                        @error('term2_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term2_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term2_en" name="term2_en" class="form-control" rows="5" required>{{ $term->translate('en')->term2 }}</textarea>
                                        @error('term2_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term3_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term3_ar" name="term3_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term3 }}</textarea>
                                        @error('term3_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term3_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term3_en" name="term3_en" class="form-control" rows="5" required>{{ $term->translate('en')->term3 }}</textarea>
                                        @error('term3_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term4_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term4_ar" name="term4_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term4 }}</textarea>
                                        @error('term4_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term4_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term4_en" name="term4_en" class="form-control" rows="5" required>{{ $term->translate('en')->term4 }}</textarea>
                                        @error('term4_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term5_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term5_ar" name="term5_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term5 }}</textarea>
                                        @error('term5_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term5_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term5_en" name="term5_en" class="form-control" rows="5" required>{{ $term->translate('en')->term5 }}</textarea>
                                        @error('term5_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term6_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term6_ar" name="term6_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term6 }}</textarea>
                                        @error('term6_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term6_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term6_en" name="term6_en" class="form-control" rows="5" required>{{ $term->translate('en')->term6 }}</textarea>
                                        @error('term6_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term7_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term7_ar" name="term7_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term7 }}</textarea>
                                        @error('term7_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term7_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term7_en" name="term7_en" class="form-control" rows="5" required>{{ $term->translate('en')->term7 }}</textarea>
                                        @error('term7_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term8_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term8_ar" name="term8_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term8 }}</textarea>
                                        @error('term8_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term8_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term8_en" name="term8_en" class="form-control" rows="5" required>{{ $term->translate('en')->term8 }}</textarea>
                                        @error('term8_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term9_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term9_ar" name="term9_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term9 }}</textarea>
                                        @error('term9_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term9_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term9_en" name="term9_en" class="form-control" rows="5" required>{{ $term->translate('en')->term9 }}</textarea>
                                        @error('term9_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term10_ar') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term10_ar" name="term10_ar" class="form-control" rows="5" required>{{ $term->translate('ar')->term10 }}</textarea>
                                        @error('term10_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label">{{ __('translations.terms-term10_en') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea id="term10_en" name="term10_en" class="form-control" rows="5" required>{{ $term->translate('en')->term10 }}</textarea>
                                        @error('term10_en')
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
