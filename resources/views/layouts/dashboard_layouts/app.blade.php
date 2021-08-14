<!DOCTYPE html>
<html lang="{{App::getLocale() == 'ar' ? 'ar' :'en'}}" dir="{{App::getLocale() == 'ar' ? 'rtl' :'ltr'}}">
    <head>
       @include('layouts.dashboard_layouts._header_meta')

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="wrapper">

            {{-- start of header --}}

            @include('layouts.dashboard_layouts._header')
            {{-- end of header --}}
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        @yield('content')

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('layouts.dashboard_layouts._footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        @include('layouts.dashboard_layouts._footer_meta')
        @include('dashboard.partials._sessions')


    </body>
</html>
