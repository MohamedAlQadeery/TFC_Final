<head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Title -->
<title>{{setting('website_name')}}</title>

<link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

@if (App::getLocale() == 'ar')


    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('web/rtl/assets/img/favicon_60x60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('web/rtl/assets/img/favicon_76x76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('web/rtl/assets/img/favicon_120x120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('web/rtl/assets/img/favicon_152x152.png')}}">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('web/rtl/assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('web/rtl/assets/plugins/slick-carousel/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('web/rtl/assets/plugins/animate.css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('web/rtl/assets/plugins/animsition/dist/css/animsition.min.css')}}" />

    <!-- CSS Icons -->
    <link rel="stylesheet" href="{{asset('web/rtl/assets/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('web/rtl/assets/plugins/font-awesome/css/font-awesome.min.css')}}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{asset('web/assets/css/rtl/themes/theme-beige.min.css')}}" />
@else
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('web/assets/img/favicon_60x60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('web/assets/img/favicon_76x76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('web/assets/img/favicon_120x120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('web/assets/img/favicon_152x152.png')}}">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('web/assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('web/assets/plugins/slick-carousel/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('web/assets/plugins/animate.css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('web/assets/plugins/animsition/dist/css/animsition.min.css')}}" />

    <!-- CSS Icons -->
    <link rel="stylesheet" href="{{asset('web/assets/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('web/assets/plugins/font-awesome/css/font-awesome.min.css')}}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{asset('web/assets/css/themes/theme-beige.min.css')}}" />
@endif
<style>
    #myform {
    text-align: center;
    padding: 5px;
    /* border: 1px dotted #ccc; */
    margin: 2%;
}
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}

.menu-img{
    height:15rem;
}
}

@media only screen and (max-width: 1025px) {
    .menu-img{
    height:12rem;
}
}

@media only screen and (max-width: 769px) {
    .menu-img{
    height:13rem;
}
}

@media only screen and (max-width: 767px) {
    .menu-img{
    height:13rem;
}
}

@media only screen and (max-width: 426px) {
    .menu-img{
    height:9rem
}
}
@media only screen and (max-width: 375px) {
    .menu-img{
    height:8rem
}
}

@media only screen and (max-width: 320px) {
    .menu-img{
    height:6rem
}
}

@media only screen and (max-width: 280px) {
    .menu-img{
    height:5rem
}
}

@media only screen and (max-width: 280px) {
    .menu-img{
    height:3rem
}
}



@media only screen and (max-width: 767px) {
    #footer{
        text-align: center;
        padding-bottom:2rem;
    }
}

.btn-secondary.disabled, .btn-secondary:disabled{
    background-color:#1e1e1e;
    border-color:#ccc;
}

.inActive{
    filter: grayscale(90%);
}

.progress-bar {
    background-color: #fefefe;
    border-radius: 3px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    margin: 15px;
    height: 20px;
    width: 500px;
    max-width: 100%;
}

.progress {
    background: #d1545a;
    background: -webkit-linear-gradient(to bottom, #5d85bb, #00e1ff);
    background: linear-gradient(to bottom, #5d85bb, #00e1ff);
    border-radius: 3px;
    height: 20px;
    width: 0;
    transition: width 0.5s ease-in;
}
</style>
</head>