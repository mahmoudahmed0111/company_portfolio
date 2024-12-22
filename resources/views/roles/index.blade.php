@extends('admin.layouts.main')
@section('title') {{ __('translations.roles') }} @endsection
@section('sub-title') {{ __('translations.roles') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">{{ __('translations.roles') }}</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">{{ __('translations.dashboard') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('translations.roles') }}</li>
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
                                    <h4 class="card-title">{{ __('translations.roles-details') }}</h4>
                                </div>
                                <div class="col-auto">
                                    @permission('roles-create')
                                        <a href="{{ route('roles.create') }}" class="btn bg-primary text-white">
                                            <i class="fas fa-plus me-1"></i> {{ __('translations.roles-create') }}
                                        </a>
                                    @endpermission
                                </div>
                            </div>
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('translations.roles-name') }}</th>
                                            <th>{{ __('translations.roles-permissions') }}</th>
                                            <th class="text-end">{{ __('translations.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->display_name }}</td>
                                                <td>
                                                    @foreach ($role->permissions as $permission)
                                                        <span class="badge bg-success">{{ $permission->display_name }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="text-end">
                                                    @permission('roles-edit')
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                    @endpermission
                                                    @permission('roles-delete')
                                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                @if ($role->name == 'superadmin') disabled @endif
                                                                onclick="return confirm('{{ __('translations.confirm-delete') }}')">
                                                                <i class="las la-trash-alt"></i>
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
