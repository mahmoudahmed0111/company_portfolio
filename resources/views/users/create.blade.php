@extends('admin.layouts.main')
@section('title') {{ __('translations.users') }} @endsection
@section('sub-title') {{ __('translations.users') }} @endsection
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
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">{{ __('translations.users-name') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">{{ __('translations.users-email') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="role" class="form-label">{{ __('translations.users-role') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" id="role" name="role" required>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">{{ __('translations.users-password') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation" class="form-label">{{ __('translations.users-repassword') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">{{ __('translations.users-phone') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="address" class="form-label">{{ __('translations.users-address') }}</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <!-- Image -->
                                    <div class="col-lg-12 mb-5">
                                        <label class="form-label">{{ __('translations.articles-image') }} <span
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
