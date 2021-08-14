<meta charset="utf-8" />
<title>TFC Resturant Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

<!-- Bootstrap Css -->

<link href="{{ asset('dashboard_files') }}/assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('dashboard_files') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{asset('dashboard_files/plugins/select2/select2.min.css')}}" rel="stylesheet">


@if (App::getLocale() == 'ar')
<link href="{{ asset('dashboard_files') }}/assets/css/app-rtl.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

@else

<link href="{{ asset('dashboard_files') }}/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

@endif

{{-- start of page only styles --}}
@stack('css')
{{-- end of page only styles --}}
