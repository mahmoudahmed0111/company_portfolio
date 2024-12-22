@extends('admin.layouts.auth')
@section('title') {{ __('translations.login') }} @endsection
@section('sub-title') {{ __('translations.login') }} @endsection
@section('content')
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                <div class="text-center p-3">
                                    <a href="index-2.html" class="logo logo-admin">
                                        <img src="assets/images/logo-sm.png" height="50" alt="{{ __('translations.logo') }}"
                                            class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">{{ __('translations.lets_get_started') }}</h4>
                                    <p class="text-muted fw-medium mb-0">{{ __('translations.sign_in_to_continue') }}</p>
                                </div>
                            </div>
                            <div class="card-body pt-0">

                                <form class="my-4" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="username">{{ __('translations.email') }}</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ __('translations.email') }}" required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label class="form-label"
                                            for="userpassword">{{ __('translations.password') }}</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="{{ __('translations.password') }}" required />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!--end form-group-->


                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid mt-3">
                                                <button class="btn btn-primary" type="submit">{{ __('translations.login') }} <i class="fas fa-sign-in-alt ms-1"></i></button>
                                            </div>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                                
                                {{-- <div class="d-flex justify-content-center">
                                    <a href="#"
                                        class="d-flex justify-content-center align-items-center thumb-md bg-blue-subtle text-blue rounded-circle me-2">
                                        <i class="fab fa-facebook align-self-center"></i>
                                    </a>
                                    <a href="#"
                                        class="d-flex justify-content-center align-items-center thumb-md bg-info-subtle text-info rounded-circle me-2">
                                        <i class="fab fa-twitter align-self-center"></i>
                                    </a>
                                    <a href="#"
                                        class="d-flex justify-content-center align-items-center thumb-md bg-danger-subtle text-danger rounded-circle">
                                        <i class="fab fa-google align-self-center"></i>
                                    </a>
                                </div> --}}
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end col-->
    </div>
@endsection
