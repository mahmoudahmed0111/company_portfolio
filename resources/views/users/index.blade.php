{{-- @extends('layouts.main')
@section('title') {{__('translations.users')}} @endsection
@section('sub-title') {{__('translations.dashboard')}} @endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        @permission('users-create')
        <a class="btn btn-primary" href="{{route('users.create')}}">
          {{__('translations.users-create')}}
        </a>
        @endpermission
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="example_1">
            <thead>
              <tr>
                <th>{{__('translations.users-name')}}</th>
                <th>{{__('translations.users-email')}}</th>
                <th>{{__('translations.users-role')}}</th>
                <th>{{__('translations.users-phone')}}</th>
                <th>{{__('translations.users-address')}}</th>
                <th>{{__('translations.actions')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @foreach ($user->roles as $role) {{$role->display_name}} @endforeach
                </td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address ?? '.. .. .. .. .. .. .. .. .. ..'}}</td>
                <td>
                  @permission('users-edit')
                  <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-sm btn-flat">{{__('translations.edit')}}</a>
                  @endpermission
                  @permission('users-delete')
                  <form action="{{route('users.destroy', $user->id)}}" class="inline" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger btn-flat" onclick="return confirm('هل أنت متأكد من عملية الحذف ؟')">{{__('translations.delete')}}</button>
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
  </div>
</div>
@endsection --}}

@extends('admin.layouts.main')
@section('title') {{ __('translations.users') }} @endsection
@section('sub-title') {{ __('translations.users') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">{{ __('translations.users') }}</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">{{ __('translations.users') }}</li>
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
                                    <h4 class="card-title">{{ __('translations.users-details') }}</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    @permission('users-create')
                                        <a href="{{ route('users.create') }}" class="btn bg-primary text-white">
                                            <i class="fas fa-plus me-1"></i>
                                            {{ __('translations.users-create') }}</a>
                                    @endpermission
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('translations.users-name') }}</th>
                                            <th>{{ __('translations.users-email') }}</th>
                                            <th>{{ __('translations.users-role') }}</th>
                                            <th>{{ __('translations.users-phone') }}</th>
                                            <th>{{ __('translations.users-address') }}</th>
                                            <th class="text-end">{{ __('translations.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">

                                                        <div class="flex-grow-1 text-truncate">
                                                            <h6 class="m-0">{{ $user->name }}</h6>
                                                            <!-- Assuming $user->name is available -->

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach($user->roles as $role)
                                                        {{ $role->display_name ?? $role->name }}{{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                </td>

                                                <td>{{ $user->phone ?? '+1 234 567 890' }}</td>
                                                <!-- Assuming phone is available -->
                                                <td>{{ $user->address }}</td>
                                                <!-- Assuming created_at is available -->

                                                <td class="text-end">
                                                    @permission('users-edit')
                                                        <a href="{{ route('users.edit', $user->id) }}">
                                                            <i class="las la-pen text-secondary fs-18"></i>
                                                        </a>
                                                    @endpermission

                                                    @permission('users-delete')
                                                        <form action="{{ route('users.destroy', $user->id) }}" class="inline"
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
