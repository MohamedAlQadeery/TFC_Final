<!-- Header -->
<header id="header" class="light">

    <div class="container" id="top">
        <div class="row">
            <div class="col-md-3">
                <nav class="module module-navigation left mr-4">
                    <ul id="nav-main" class="nav nav-main">

                        <li><a href="{{ route('dashboard.lang','ar') }}"><img class="{{ app()->getLocale() == "ar"? "": "inActive"}}" src="{{asset('web/assets/img/ar.png')}}" width="30px" alt=""></a></li>
                        <li><a href="{{ route('dashboard.lang','en') }}"><img class="{{ app()->getLocale() == "en"? "": "inActive"}}" src="{{asset('web/assets/img/en.png')}}" width="30px" alt=""></a></li>
                        <li><a href="{{ route('dashboard.lang','tr') }}"><img class="{{ app()->getLocale() == "tr"? "": "inActive"}}" src="{{asset('web/assets/img/tr.png')}}" width="30px" alt=""></a></li>
                    </ul>
                </nav>
                <!-- Logo -->
               
            </div>
            <div class="col-md-6 text-center">
                <!-- Navigation -->
                <nav class="module module-navigation center  ">
                    <ul id="nav-main" class="nav nav-main">
                        <li><a href="{{ route('web.home') }}" ><img src="{{asset('images/logo.png')}}" width="60px" style="border-radius: 50%" alt=""></a></li>
                    </ul>
                </nav>
                {{-- <div class="text-center">
                    <a href="index.html">
                    </a>
                </div> --}}
                {{-- <div class="module left">
                    <a href="menu-list-navigation.html" class="btn btn-outline-secondary"><span>Order</span></a>
                </div> --}}
            </div>
            <div class="col-md-3">
                <a href="#" class="module module-cart right" data-toggle="panel-cart">
                    <span class="cart-icon">
                        <i class="ti ti-shopping-cart"></i>
                        <span class="notification">0</span>
                    </span>
                    <b>{{app()->getLocale()=="ar" ? "TL":""}}</b><span class="cart-value">0</span> <b>{{app()->getLocale()=="en" || app()->getLocale()=="tr" ? "TL":""}}</b>
                </a>
            </div>
        </div>
    </div>

</header>
<!-- Header / End -->

<!-- Header -->
<header id="header-mobile" class="light">

    <div class="module module-nav-toggle">
        <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
    </div>    

    <div class="module module-logo">
        <a href="{{route('web.home')}}">
            <img src="{{asset('images/logo.png')}}" width="30px" style="border-radius: 50%">
        </a>
    </div>

    <a href="#" class="module module-cart" data-toggle="panel-cart">
        <i class="ti ti-shopping-cart"></i>
        <span class="notification">0</span>
    </a>

</header>
<!-- Header / End -->