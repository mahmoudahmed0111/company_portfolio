@extends('admin.layouts.main')
@section('title') {{ __('translations.Packages') }} @endsection
@section('sub-title') {{ __('translations.Packages') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">{{ __('translations.Packages') }}</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">{{ __('translations.Packages') }}</li>
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
                                    <h4 class="card-title">{{ __('translations.Packages Details') }}</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    @permission('packages-create')
                                        <a href="{{ route('packages.create') }}" class="btn bg-primary text-white">
                                            <i class="fas fa-plus me-1"></i>
                                            {{ __('translations.packages-create') }}</a>
                                    @endpermission
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('translations.packages-name') }}</th>
                                            <th>{{ __('translations.packages-price') }}</th>
                                            <th>{{ __('translations.packages-type') }}</th>
                                            <th class="text-end">{{ __('translations.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($packages as $package)
                                            <tr>
                                                <td>{{ $package->name }}</td>
                                                <td>{{ $package->price }}</td>
                                                <td>{{ $package->type }}</td>

                                                <td class="text-end">
                                                    @permission('packages-edit')
                                                        <a href="{{ route('packages.edit', $package->id) }}">
                                                            <i class="las la-pen text-secondary fs-18"></i>
                                                        </a>
                                                    @endpermission

                                                    @permission('packages-delete')
                                                        <form action="{{ route('packages.destroy', $package->id) }}"
                                                            class="inline" method="post" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                style="border: none; background-color: transparent;"
                                                                onclick="return confirm('هل أنت متأكد من عملية الحذف ؟')">
                                                                <i class="las la-trash-alt text-secondary fs-18"></i>
                                                            </button>
                                                        </form>
                                                    @endpermission
                                                </td>
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
