@extends('admin.layouts.main')
@section('title') {{ __('translations.profile') }} @endsection
@section('sub-title') {{ __('translations.profile') }} @endsection

@section('title')
    {{ __('translations.edit-profile') }}
@endsection

@section('sub-title')
    {{ __('translations.dashboard') }}
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('translations.users-create') }}</h4>
                            <p class="card-title-desc">{{ __('translations.fill-details-to-create-user') }}</p>
                        </div>
                        <div class="card-body">
                            <!-- Profile Picture Upload Form -->
                            <form action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="picture" class="form-label">{{ __('translations.upload-profile-picture') }}</label>
                                    <input type="file" name="image" accept="image/*" required class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">{{ __('translations.upload') }}</button>
                            </form>

                            <hr>


                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-docs mb-2">
                        <div class="card-header">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">{{ __('translations.personal-info') }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Personal Info Update Form -->
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.users-name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required />
                                        @error('name')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.users-email') }} <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required />
                                        @error('email')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.users-phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" required />
                                        @error('phone')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">{{ __('translations.users-address') }}</label>
                                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" />
                                        @error('address')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex pt-5 justify-content-between align-items-center">
                                    <a href="{{ route('index') }}" class="btn btn-secondary">
                                        {{ __('translations.back') }} <i class="fa fa-undo" aria-hidden="true"></i>
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('translations.submit') }} <i class="fa fa-check" aria-hidden="true"></i>
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
