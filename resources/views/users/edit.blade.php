@extends('admin.layouts.main')
@section('title')
    {{ __('translations.users') }}
@endsection
@section('sub-title')
    {{ __('translations.users') }}
@endsection
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
                            <form action="{{ route('users.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">{{ __('translations.users-name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">{{ __('translations.users-email') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Role -->
                                    <div class="col-md-6 mb-3">
                                        <label for="role" class="form-label">{{ __('translations.users-role') }} <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="role" name="role" required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $user->roles->contains($role) ? 'selected' : '' }}>
                                                    {{ $role->display_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">{{ __('translations.users-phone') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone', $user->phone) }}" required>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-12 mb-3">
                                        <label for="address"
                                            class="form-label">{{ __('translations.users-address') }}</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address', $user->address) }}">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Image -->
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">{{ __('translations.articles-image') }}</label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                        <div class="mt-2">
                                            @if ($user->image)
                                                <img src="{{ asset('storage/' . $user->image) }}" alt="User Image"
                                                    class="img-thumbnail" width="150">
                                            @else
                                                <p>{{ __('translations.no-image') }}</p>
                                            @endif
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('translations.edit') }} <i class="fas fa-check ms-1"></i>
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
