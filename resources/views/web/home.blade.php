@extends('web.layouts.app')
@section('content')

<!-- Section - Main -->
{{-- <section class="section section-main section-main-1 bg-light">
            
    <div class="container dark">
        <div class="slide-container">
            <div id="section-main-1-carousel-image" class="image inner-controls">
                <div class="slide"><div class="bg-image"><img src="{{asset('web/assets/img/photos/slider-pasta.jpg')}}" alt=""></div></div>
                <div class="slide"><div class="bg-image"><img src="{{asset('web/assets/img/photos/slider-burger.jpg')}}" alt=""></div></div>
                <div class="slide"><div class="bg-image"><img src="{{asset('web/assets/img/photos/slider-dessert.jpg')}}" alt=""></div></div>
            </div>
            <div class="content dark">
                <div id="section-main-1-carousel-content">
                    <div class="content-inner">
                        <h4 class="text-muted">New product!</h4>
                        <h1>Boscaiola Pasta</h1>
                        <div class="btn-group">
                            <a href="#productModal" data-toggle="modal" class="btn btn-outline-primary btn-lg"><span>Add to cart</span></a>
                            <span class="price price-lg">from $9.98</span>
                        </div>
                    </div>
                    <div class="content-inner">
                        <h1>Get 10% off coupon</h1>
                        <h5 class="text-muted mb-5">and use it with your next order!</h5>
                        <a href="page-offers.html" class="btn btn-outline-primary btn-lg"><span>Get it now!</span></a>
                    </div>
                    <div class="content-inner">
                        <h1>Delicious Desserts</h1>
                        <h5 class="text-muted mb-5">Order it online even now!</h5>
                        <a href="menu-list-collapse.html" class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
                    </div>
                </div>
                <nav class="content-nav">
                    <a class="prev" href="#"><i class="ti-arrow-left"></i></a>
                    <a class="next" href="#"><i class="ti-arrow-right"></i></a>
                </nav>
            </div>
        </div>
    </div>

</section> --}}
 <!-- Section - Main -->
 {{-- <section class="section section-main section-main-2 bg-dark dark">

    <div id="section-main-2-slider" class="section-slider inner-controls">
        <!-- Slide -->
        <div class="slide">
            <div class="bg-image zooming"><img src="{{asset('web/assets/img/photos/slider-burger_dark.jpg')}}" alt=""></div>
            <div class="container v-center">
                <h1 class="display-2 mb-2">Get 10% off coupon</h1>
                <h4 class="text-muted mb-5">and use it with your next order!</h4>
                <a href="page-offers.html" class="btn btn-outline-primary btn-lg"><span>Get it now!</span></a>
            </div>
        </div>
        <!-- Slide -->
        <div class="slide">
            <div class="bg-image zooming"><img src="{{asset('web/assets/img/photos/slider-dessert_dark.jpg')}}" alt=""></div>
            <div class="container v-center">
                <h1 class="display-2 mb-2">Delicious Desserts</h1>
                <h4 class="text-muted mb-5">Order it online even now!</h4>
                <a href="menu-list-collapse.html" class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
            </div>
        </div>
        <!-- Slide -->
        <div class="slide">
            <div class="bg-image zooming"><img src="{{asset('web/assets/img/photos/slider-pasta_dark.jpg')}}" alt=""></div>
            <div class="container v-center">
                <h4 class="text-muted">New product!</h4>
                <h1 class="display-2">Boscaiola Pasta</h1>
                <div class="btn-group">
                    <a href="#productModal" data-toggle="modal" class="btn btn-outline-primary btn-lg"><span>Add to cart</span></a>
                    <span class="price price-lg">from $9.98</span>
                </div>
            </div>
        </div>
    </div>

</section> --}}

   <!-- Section - Main -->
   <section class="section section-main section-main-2 bg-dark dark">

    <!-- Video BG -->
    <div class="bg-video" data-property="{videoURL:'{{setting('video_url')}}', showControls: false, containment:'self',startAt:1,stopAt:39,mute:true,autoPlay:true,loop:true,opacity:0.3,quality:'hd1080'}"></div>
    <div class="bg-image bg-video-placeholder zooming"><img src="{{asset('web/assets/img/photos/bg-restaurant.jpg')}}" alt=""></div>

    <div class="container v-center text-center">
        <img src="{{asset('images/logo.png')}}" style="border-radius: 50%;" alt="" width="180" class="mb-5">
        <h1 class="display-2 mb-2">{{setting('home_desc_ar')}}</h1>
        <h4 class="text-muted mb-5">{{setting('home_desc_2_ar')}}</h4>
        {{-- <a href="#menu" class="btn btn-outline-primary btn-lg"><span>Order online!</span></a> --}}
    </div>

</section>


         <!-- Page Title -->
         {{-- <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Menu Grid</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Page Content -->
        <div class="page-content">
            <div  class="container">
                <div class="row no-gutters">
                    <div class="col-md-10 push-md-1" role="tablist">

                        {{-- looping on categories --}}
                        @foreach ($categories as $category)
                                {{-- <div class="menu-category-title collapse-toggle collapsed" role="tab" data-target="#menuBurgersContent" data-toggle="collapse" aria-expanded="true"> --}}
                            
                            <div id="{{ $category->id}}" class="menu-category">
                                <div class="menu-category-title collapse-toggle " role="tab" data-target="#menu{{ $category->id}}Content" data-toggle="collapse" aria-expanded="fasle">
                                    <div class="bg-image"><img src="{{ $category->getMedia()[0]->getUrl('front') }}"  alt="{{ $category->lang_name }}"></div>
                                    <h2 class="title">{{$category->lang_name}}</h2>
                                </div>

                                <div id="menu{{ $category->id}}Content" class="menu-category-content padded collapse" aria-expanded="false">
                                    <div class="row gutters-sm">
                                        @if (count($category->foods)>0)
                                            @foreach ($category->foods as $food) 
                                                <div class="col-lg-4 col-6">
                                                    <!-- Menu Item -->
                                                    <div class="menu-item menu-grid-item">
                                                        <img class="mb-4" src="{{ $food->getMedia()[0]->getUrl('thumb') }}"  alt="{{ $food->lang_name }}" >
                                                        <h6 class="mb-0">{{$food->lang_name}}</h6>
                                                        <span class="text-muted text-sm">{{$food->lang_desc}}</span>
                                                        <div class="row align-items-center mt-4">
                                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">@lang('web.cost')</span> ₺{{$food->price}}</span></div>
                                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-target="#productModal{{$food->id}}" data-toggle="modal"><span>@lang('web.add_to_cart')</span></button></div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


       

@endsection

