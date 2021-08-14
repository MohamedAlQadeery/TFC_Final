 <!-- Footer -->
 <footer id="footer" class="bg-dark dark">
            
    <div class="container">
        <!-- Footer 1st Row -->
        <div class="footer-first-row row">
            <div class="col-lg-3 text-center">
                <a href="{{route('web.home')}}"><img src="{{asset('images/logo.png')}}" alt="" style="border-radius: 50%;" width="88" class="mt-5 mb-5"></a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-muted">@lang('web.about_us')</h5>
                <ul class="list-posts">
                    <li>
                        <a href="#" onclick="return false;" class="title">
                            @if (app()->getLocale()=="ar")
                                {{setting('ar_aboutus')}}
                            @elseif(app()->getLocale()=="en")    
                                {{setting('en_aboutus')}}
                            @else
                                {{setting('tr_aboutus')}}
                            @endif
                        </a>
                    </li>
                    <li>
                    <h5 class="text-muted">@lang('web.contact_email')</h5>
                        <span><a class="title" href="mailto:{{setting('email')}}"> {{setting('email')}}</a></span>
                    </li>
                    
                </ul>
            </div>
            <div class="col-lg-5 col-md-6">
                <h5 class="text-muted">@lang('web.address')</h5>
                <!-- MailChimp Form -->
                <ul class="list-posts">
               
                    <li>
                        <a href="#" onclick="return false;" class="title"> {{setting('address')}}</a>
                    </li>
                </ul>
                <h5 class="text-muted mb-3">@lang('web.follow_us')</h5>
                <a href="{{setting('facebook_url')}}" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                <a href="{{setting('whatsapp_number')}}" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-whatsapp"></i></a>
                <a href="{{setting('twitter_url')}}" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                <a href="{{setting('twitter_url')}}" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                <a href="{{setting('instagram_url')}}" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
            </div>
            
        </div>
        {{-- <div class="footer-first-row text-center">
            <div style="width: 35%"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Kayaba%C5%9F%C4%B1,%2034494%20Ba%C5%9Fak%C5%9Fehir/%C4%B0stanbul+(TFC%20resturant)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/draw-radius-circle-map/">Easy radius map</a></div>   
        </div> --}}
        <!-- Footer 2nd Row -->
        <div class="footer-second-row text-center">
            <span class="text-muted">@lang('web.Copyright') Soup 2017©. Designed with love by Suelo.</span> &nbsp;&nbsp;&nbsp;
            <br>
            <span class="title">@lang('web.developed_by') 2020©. <a href="https://wa.me/+905466497805" class="title">E-Dolphins Team </a> </span>
        </div>

        

    </div>

    <!-- Back To Top -->
    <a href="#"  id="back-to-top"><i class="ti ti-angle-up"></i></a>

</footer>
<!-- Footer / End -->
