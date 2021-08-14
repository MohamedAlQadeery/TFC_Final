<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            
            <img src="{{ asset('images/logo.png') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <p  class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" >{{ auth()->user()->name }}</p>

            </div>
            <p class="text-muted">{{ app()->getLocale()=='ar' ? 'الادمن': 'Admin' }}</p>

        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu" >

            <ul class="metismenu" id="side-menu" >

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('dashboard.index')}}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> @lang('dashboard.dashboard') </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-silverware-variant"></i>
                        <span> @lang('dashboard.categories') </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('dashboard.categories.index') }}"><i class="mdi mdi-silverware-variant"></i>@lang('dashboard.categories')</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-shape-plus"></i>
                        <span> @lang('dashboard.attributes') </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('dashboard.attributes.index') }}"><i class="mdi mdi-shape-plus"></i>@lang('dashboard.attributes')</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-food"></i>
                        <span> @lang('dashboard.food') </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('dashboard.foods.index') }}"><i class="mdi mdi-food"></i>@lang('dashboard.food')</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-cog"></i>
                        <span> @lang('dashboard.settings') </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('dashboard.settings.index') }}"><i class="mdi mdi-cog"></i>@lang('dashboard.settings')</a></li>

                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-page-layout-sidebar-left"></i>
                        <span> @lang('dashboard.slider') </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('dashboard.sliders.index') }}"><i class="mdi mdi-view-dashboard"></i>@lang('dashboard.sliders')</a></li>

                    </ul>
                </li> --}}



            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
