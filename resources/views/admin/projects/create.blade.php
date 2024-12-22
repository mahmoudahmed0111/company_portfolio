@extends('admin.layouts.main')
@section('title') {{ __('translations.Projects') }} @endsection
@section('sub-title') {{ __('translations.Projects') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.projects-create') }}</h4>
                            <p class="card-title-desc">{{ __('translations.fill-details-to-create-project') }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Name AR -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name_ar" class="form-label">{{ __('translations.projects-name_ar') }} 
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                                        @error('name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Name EN -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name_en" class="form-label">{{ __('translations.projects-name_en') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" required>
                                        @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Description AR -->
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.projects-description_ar') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description_ar" required></textarea>
                                        @error('description_ar')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Description EN -->
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.projects-description_en') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description_en" required></textarea>
                                        @error('description_en')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Images Section -->
                                    <div class="col-lg-12 mb-5">
                                        <label class="form-label">{{ __('translations.projects-images') }} <span
                                                class="text-danger">*</span></label>
                                        <div id="images-wrapper">
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="images[]" accept="image/*"
                                                    required>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="add-image-btn">
                                            {{ __('translations.add-another-image') }} <i class="fas fa-plus ms-1"></i>
                                        </button>
                                        @error('images')
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addImageBtn = document.getElementById('add-image-btn');
            const imagesWrapper = document.getElementById('images-wrapper');

            addImageBtn.addEventListener('click', function() {
                const newImageField = document.createElement('div');
                newImageField.className = 'row align-items-center mb-3';

                // الحقل الخاص بالصورة مع زر الحذف
                newImageField.innerHTML = `
            <div class="col-md-10">
                <input type="file" class="form-control" name="images[]" accept="image/*" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-image-btn">
                    <i class="fas fa-trash-alt"></i> حذف
                </button>
            </div>
        `;
                imagesWrapper.appendChild(newImageField);

                // إضافة الحدث لزر الحذف الخاص بالصورة
                const removeBtn = newImageField.querySelector('.remove-image-btn');
                removeBtn.addEventListener('click', function() {
                    newImageField.remove();
                });
            });
        });
    </script>
@endsection
