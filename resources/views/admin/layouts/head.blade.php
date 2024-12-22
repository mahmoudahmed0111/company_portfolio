
<meta charset="utf-8" />

<title>{{ $setting->name }}-@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


<link href="{{ asset('assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@if (App::getLocale() == 'ar')
<link href="{{ asset('assets/css/bootstrap.min-rtl.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/app.min-rtl.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
@endif
