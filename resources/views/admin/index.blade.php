@extends('admin.layouts.main')

@section('title')
    Dashboard
@endsection
@section('sub-title')
    Dashboard
@endsection
@section('content')

    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.usersCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-solid fa-user-group"></i></span>
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $usersCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.servicesCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-brands fa-servicestack"></i></span>
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $servicesCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.articlesCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-solid fa-newspaper"></i></span>
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $articlesCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.projectsCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-solid fa-diagram-project"></i></span>
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $projectsCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.packagesCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-solid fa-boxes-packing"></i></span>
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $packagesCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.marketingPackagesCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-solid fa-rectangle-ad"></i></span>
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $marketingPackagesCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.serverPackagesCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-solid fa-database"></i></span>
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $serverPackagesCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div style="text-align: center;" class="col-md-3">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">{{ __('translations.emailPackagesCount') }}</span>
                                </div>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i style="font-size: 30px; margin-top: 30px;"
                                            class="fa-solid fa-envelope"></i></span>
                                    {{-- <span class="text-success"><i style="font-size: 30px"
                                            class="iconoir-phone menu-icon"></i></span> --}}
                                </p>
                                <h4 class="my-2 fs-24 fw-semibold"> {{ $emailPackagesCount }} </h4>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->


            <div class="row">
                <!-- الرسم البياني بالأعمدة -->
                <div class="col-md-6 col-lg-6 order-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">{{ __('translations.Packages') }}</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    <div class="p-2 border-dashed border-theme-color rounded">
                                        <small class="text-muted">{{ __('translations.number') }}</small>
                                        <h5 class="mt-1 mb-0 fw-medium">{{ $packagesCount }}</h5>
                                    </div>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div>
                        <div class="card-body pt-0">
                            <div id="balance" class="apex-charts">
                                <canvas id="packagesChartBar" width="400" height="200"></canvas>
                                <!-- ارتفاع 200px -->
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>

                <!-- الرسم البياني الدائري -->
                <div class="col-md-6 col-lg-6 order-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">{{ __('translations.Packages') }}</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    <div class="p-2 border-dashed border-theme-color rounded">
                                        <small class="text-muted">{{ __('translations.number') }}</small>
                                        <h5 class="mt-1 mb-0 fw-medium">{{ $packagesCount }}</h5>
                                    </div>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div>
                        <div class="card-body pt-0">
                            <div id="balance" class="apex-charts"
                                style="height: 320px; width: 320px; margin-left: auto; margin-right: auto;">
                                <canvas id="packagesChartPie" width="400" height="200"
                                    style="display: block; box-sizing: border-box; height: 320px; width: 320px;"></canvas>
                                <!-- تم تعديل الارتفاع ليصبح 200px -->
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </div>






        </div><!-- container -->

        <!--end footer-->
    </div>
    <!-- end page content -->





    <script>
        // Data from Laravel
        const chartData = @json($chartData);

        // الرسم البياني بالأعمدة
        const ctxBar = document.getElementById('packagesChartBar').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: '{{ __('translations.Number of Packages') }}',
                    data: chartData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // الرسم البياني الدائري
        const ctxPie = document.getElementById('packagesChartPie').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut', // يمكن تغييره إلى 'pie'
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Package Distribution',
                    data: chartData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' packages';
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
