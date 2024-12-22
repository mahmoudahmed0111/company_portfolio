@extends('admin.layouts.main')
@section('title')
    {{ __('translations.Contactus') }}
@endsection
@section('sub-title')
    {{ __('translations.Contactus') }}
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">{{ __('translations.Contactus') }}</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">{{ __('translations.Contactus') }}</li>
                            </ol>
                        </div>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">{{ __('translations.Contactus Details') }}</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    @permission('contactus-create')
                                        <a href="{{ route('contactus.create') }}" class="btn bg-primary text-white">
                                            <i class="fas fa-plus me-1"></i>
                                            {{ __('translations.contactus-create') }}</a>
                                    @endpermission
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('translations.contactus-name') }}</th>
                                            <th>{{ __('translations.contactus-email') }}</th>
                                            <th>{{ __('translations.contactus-description') }}</th>
                                            <th>{{ __('translations.contactus-message') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contactus as $contact)
                                            <tr>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->subject }}</td>
                                                <td>{{ $contact->message }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->


    </div>
@endsection
