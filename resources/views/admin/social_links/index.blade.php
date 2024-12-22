@extends('admin.layouts.main')
@section('title')
    {{ __('translations.social_links-list') }}
@endsection
@section('sub-title')
    {{ __('translations.social_links') }}
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">{{ __('translations.social_links') }}</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">

                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">{{ __('translations.social_links') }}</li>
                                <li class="breadcrumb-item"><a href="#">{{ __('translations.home') }}</a>
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
                                    <h4 class="card-title">{{ __('translations.social_links-details') }}</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    @permission('social_links-create')
                                        <a href="{{ route('social_links.create') }}" class="btn bg-primary text-white">
                                            <i class="fas fa-plus me-1"></i>
                                            {{ __('translations.social_links-create') }}</a>
                                    @endpermission
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('translations.social_links-name') }}</th>
                                            <th>{{ __('translations.social_links-link') }}</th>
                                            <th>{{ __('translations.social_links-icon') }}</th>
                                            <th class="text-end">{{ __('translations.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($social_links as $info)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">

                                                        <div class="flex-grow-1 text-truncate">
                                                            <h6 class="m-0">{{ $info->name }}</h6>
                                                            <!-- Assuming $info->name is available -->

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $info->link }}</td>
                                                <td>{{ $info->icon }}</td>
                                                <td class="text-end">
                                                    @permission('social_links-edit')
                                                        <a href="{{ route('social_links.edit', $info->id) }}">
                                                            <i class="las la-pen text-secondary fs-18"></i>
                                                        </a>
                                                    @endpermission

                                                    @permission('social_links-delete')
                                                        <form action="{{ route('social_links.destroy', $info->id) }}" class="inline"
                                                            method="post" style="display:inline;">
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
