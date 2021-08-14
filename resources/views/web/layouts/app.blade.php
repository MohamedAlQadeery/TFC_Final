<!DOCTYPE html>
<html dir="{{app()->getLocale() == "ar"?"rtl":"ltr"}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">


@include('web.layouts.web_layouts.header_meta')

<body>
<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">
    @include('web.layouts.web_layouts.header')

    <!-- Content -->
    <div id="content">
        @yield('content')

        @include('web.layouts.web_layouts.footer')

    </div>
    <!-- Content / End -->

    @include('web.layouts.web_layouts.panel_cart')

<!-- Body Overlay -->
<div id="body-overlay"></div>

</div>
@include('web.layouts.web_layouts.products_modal')

@include('web.layouts.web_layouts.footer_meta')


</body>

</html>