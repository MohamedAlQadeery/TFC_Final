 <!-- Panel Cart -->
 <div id="panel-cart">
    <div class="panel-cart-container">
        <div class="panel-cart-title">
            <h5 class="title">@lang('web.your_cart')</h5>
            <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
        </div>
        <div class="panel-cart-content">
            <form action="{{route('web.sendOrder')}}" id="send-order"  method="POST">
                @csrf
            <table class="table-cart">
                {{-- <tr>
                    <td class="title">
                        <span class="name"><a href="#productModal" data-toggle="modal">Pizza Chicked BBQ</a></span>
                        <span class="caption text-muted">26”, deep-pan</span>
                    </td>
                    <td class="price">45</td>
                    <td class="price">$9.82</td>
                    <td class="actions">
                        <a href="#productModal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                        <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                    </td>
                </tr> --}}
            </table>

            <div class="cart-summary">
                <div class="row">
                    <div class="col-7 text-right text-muted">@lang('web.subtotal'):</div>
                    <div class="col-5"><strong class="subTotal">0</strong><b> TL</b></div>
                </div>
                <div class="row">
                    <div class="col-7 text-right text-muted">@lang('web.devliery'):</div>
                    <div class="col-5"><strong class="devliery">{{setting('delivery_price') > 0 ?setting('delivery_price')  :0 }}</strong><b> TL</b></div>
                </div>
                <hr class="hr-sm">
                <div class="row text-lg">
                    <div class="col-7 text-right text-muted">@lang('web.total'):</div>
                    <div class="col-5"><strong class="total">0</strong><b> TL</b></div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" id="submit-order" disabled class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>@lang('web.send_order')</span></button>
    </form>

</div>

<!-- Panel Mobile -->
<nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="{{route('web.home')}}">
            <img src="{{asset('images/logo.png')}}"  style="border-radius: 50%" width="88">
        </a>
        <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
    </div>
    <nav class="module module-navigation"></nav>
    <div class="module module-social">
        <h6 class="text-sm mb-3">@lang('web.follow_us')</h6>
        <a href="{{setting('facebook_url')}}" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
        <a href="{{setting('whatsapp_number')}}" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-whatsapp"></i></a>
        <a href="{{setting('twitter_url')}}" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
        <a href="{{setting('twitter_url')}}" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
        <a href="{{setting('instagram_url')}}" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
    </div>
</nav>