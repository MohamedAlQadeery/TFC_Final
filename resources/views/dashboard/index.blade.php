@extends('layouts.dashboard_layouts.app')



@section('content')
<div class="row">
    <div class="col-xl-6 col-md-12">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-primary" data-plugin="counterup">{{ $categories_count }}</h2>
                <h1><i class="mdi mdi-silverware-variant"></i></h1>
                <h5>@lang('dashboard.categories')</h5>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-12">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-pink" data-plugin="counterup">{{ $food_count }}</h2>
                <h1><i class="mdi mdi-food"></i></h1>
                <h5>@lang('dashboard.foods')</h5>
            </div>
        </div>
    </div>

   
</div>

<div class="row">
    <div class="col-xl-6 col-md-12">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-warning" data-plugin="counterup">{{ $attr_count }}</h2>
                <h1><i class="mdi mdi-shape-plus"></i></h1>
                <h5>@lang('dashboard.attributes')</h5>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-12">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-info" data-plugin="counterup">1254</h2>
                <h1><i class="mdi mdi-account-multiple"></i></h1>
                <h5>@lang('dashboard.vistors')</h5>
            </div>
        </div>
    </div>
</div>
{{-- 
<div class="row">
    <div class="col-xl-4">
        <div class="card-box">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                </div>
            </div>

            <h4 class="header-title mt-0 mb-3">Line Charts</h4>

            <div id="sparkline1"><canvas width="271" height="165" style="display: inline-block; width: 271.2px; height: 165px; vertical-align: top;"></canvas></div>
        </div>
    </div><!-- end col-->

    <div class="col-xl-4">
        <div class="card-box">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                </div>
            </div>

            <h4 class="header-title mt-0 mb-3">Bar Chart</h4>

            <div id="sparkline2" class="text-center">
                <canvas width="205" height="165" style="display: inline-block; width: 205px; height: 165px; vertical-align: top;"></canvas></div>
                    </div>
    </div><!-- end col-->

    <div class="col-xl-4">
        <div class="card-box">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                </div>
            </div>

            <h4 class="header-title mt-0 mb-3">Pie Chart</h4>

            <div id="sparkline3" class="text-center"><canvas width="165" height="165" style="display: inline-block; width: 165px; height: 165px; vertical-align: top;"></canvas></div>
        </div>
    </div><!-- end col-->
</div> --}}

@endsection



@push('js')
   <!-- jquery knob -->
   <script src="{{ asset('dashboard_files') }}/assets/libs/jquery-knob/jquery.knob.min.js"></script>

   <!-- Sparkline charts -->
   <script src="{{ asset('dashboard_files') }}/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
   <script src="{{ asset('dashboard_files') }}/assets/js/pages/charts-other.init.js"></script>

   <!-- peity charts -->
   <script src="{{ asset('dashboard_files') }}/assets/libs/peity/jquery.peity.min.js"></script>

@endpush
