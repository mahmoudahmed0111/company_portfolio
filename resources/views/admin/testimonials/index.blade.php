@extends('admin.layouts.main')
@section('title') {{ __('translations.Testimonials') }} @endsection
@section('sub-title') {{ __('translations.Testimonials') }} @endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">{{ __('translations.Testimonials') }}</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">{{ __('translations.Testimonials') }}</li>
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
                                    <h4 class="card-title">{{ __('translations.Testimonials Details') }}</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    @permission('testimonials-create')
                                        <a href="{{ route('testimonials.create') }}" class="btn bg-primary text-white">
                                            <i class="fas fa-plus me-1"></i>
                                            {{ __('translations.testimonials-create') }}</a>
                                    @endpermission
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('translations.testimonials-image') }}</th>
                                            <th>{{ __('translations.testimonials-name') }}</th>
                                            <th>{{ __('translations.testimonials-description') }}</th>
                                            <th class="text-end">{{ __('translations.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $testimonial)
                                            <tr>
                                                <td>
                                                    <img style="border-radius: 50%;" src="{{ asset('storage/' . $testimonial->image) }}" alt="testimonial Image"
                                                        width="100" height="100">
                                                </td>

                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ $testimonial->description }}</td>

                                                <td class="text-end">
                                                    @permission('testimonials-edit')
                                                        <a href="{{ route('testimonials.edit', $testimonial->id) }}">
                                                            <i class="las la-pen text-secondary fs-18"></i>
                                                        </a>
                                                    @endpermission

                                                    @permission('testimonials-delete')
                                                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}"
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
