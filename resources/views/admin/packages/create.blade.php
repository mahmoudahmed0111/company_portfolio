@extends('admin.layouts.main')
@section('title') {{ __('translations.Packages') }} @endsection
@section('sub-title') {{ __('translations.Packages') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.packages-create') }}</h4>
                            <p class="card-title-desc">{{ __('translations.fill-details-to-create-package') }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name_ar" class="form-label">{{ __('translations.packages-name_ar') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                                        @error('name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="name_en" class="form-label">{{ __('translations.packages-name_en') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" required>
                                        @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- حقل النوع -->
                                    <div class="col-md-6 mb-3">
                                        <label for="type" class="form-label">نوع الباقة</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="">اختر النوع</option>
                                            <option value="marketing">{{ __('translations.marketing') }}</option>
                                            <option value="servers">{{ __('translations.servers') }}</option>
                                            <option value="emails">{{ __('translations.emails') }}</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">{{ __('translations.packages-price') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" id="price" name="price" required>
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- ميزات الباقة بالعربي و بالإنجليزي -->
                                    <div class="col-md-12 mb-3">
                                        <label for="features" class="form-label">{{ __('translations.packages-features') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div id="features">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" name="features_ar[]"
                                                        placeholder="{{ __('translations.packages-features_ar') }}"
                                                        required>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" name="features_en[]"
                                                        placeholder="{{ __('translations.packages-features_ar') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-link"
                                            id="add-feature">{{ __('translations.add-feature') }}</button>
                                        <button type="button" class="btn btn-danger" id="remove-feature"
                                            style="display: none;">{{ __('translations.remove-feature') }}</button>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('translations.create') }} <i class="fas fa-check ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // إضافة ميزات جديدة (عربي وإنجليزي)
        document.getElementById('add-feature').addEventListener('click', function() {
            const featureContainer = document.getElementById('features');
            const newFeature = document.createElement('div');
            newFeature.classList.add('row');
            newFeature.innerHTML = `
        <div class="col-md-6 mb-2">
            <input type="text" class="form-control" name="features_ar[]" placeholder="{{ __('translations.packages-features_ar') }}" required>
        </div>
        <div class="col-md-6 mb-2">
            <input type="text" class="form-control" name="features_en[]" placeholder="{{ __('translations.packages-features_ar') }}" required>
        </div>
    `;
            featureContainer.appendChild(newFeature);

            // إظهار زر حذف الميزات إذا تم إضافة ميزات
            document.getElementById('remove-feature').style.display = 'inline';
        });

        // حذف الميزات المضافة
        document.getElementById('remove-feature').addEventListener('click', function() {
            const featureContainer = document.getElementById('features');
            const featureEntries = featureContainer.getElementsByClassName('row');
            if (featureEntries.length > 1) {
                featureContainer.removeChild(featureEntries[featureEntries.length - 1]);
            }

            // إخفاء زر حذف الميزات إذا لم يبقَ أي ميزات
            if (featureEntries.length === 1) {
                document.getElementById('remove-feature').style.display = 'none';
            }
        });
    </script>

@endsection
