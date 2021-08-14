@extends('layouts.dashboard_layouts.app')



@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.dashboard')</a></li>
      <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.settings')</li>
    </ol>
  </nav>
<div class="row">


    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">@lang('dashboard.settings')</h4>


            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <form class="form-horizontal" role="form" action="{{ route('dashboard.settings.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row ">
                            <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.website_name')</label>
                            <div class="col-md-10">
                                <input type="text" name="website_name" class="form-control" value="{{ setting('website_name') }}">
                            </div>

                        </div>


                        <div class="form-group row ">
                            <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.video_url')</label>
                                <div class="col-md-10">
                                    <input type="text" name="video_url"
                                     class="form-control" value="{{ setting('video_url') }}">
                                </div>
                        </div>

                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.email')</label>
                                <div class="col-md-4">
                                    <input type="text" name="email" class="form-control" value="{{ setting('email') }}">
                                </div>

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.facebook_url')</label>
                                <div class="col-md-4">
                                    <input type="text" name="facebook_url"
                                     class="form-control" value="{{ setting('facebook_url') }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.instagram_url')</label>
                                <div class="col-md-4">
                                    <input type="text" name="instagram_url"
                                     class="form-control" value="{{ setting('instagram_url') }}">
                                </div>

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.twitter_url')</label>
                                <div class="col-md-4">
                                    <input type="text" name="twitter_url"
                                     class="form-control" value="{{ setting('twitter_url') }}">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.whatsapp_number')</label>
                                <div class="col-md-4">
                                    <input type="text" name="whatsapp_number"
                                     class="form-control" value="{{ setting('whatsapp_number') }}">
                                </div>

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.address')</label>
                                <div class="col-md-4">
                                    <input type="text" name="address"
                                     class="form-control" value="{{ setting('address') }}">
                                </div>
                            </div>



                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.home_desc_ar')</label>
                                <div class="col-md-4">
                                    <input type="text" name="home_desc_ar" class="form-control" value="{{ setting('home_desc_ar') }}">
                                </div>

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.home_desc_en')</label>
                                <div class="col-md-4">
                                    <input type="text" name="home_desc_en" class="form-control" value="{{ setting('home_desc_en') }}">
                                </div>
                            </div>
    
                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.home_desc_tr')</label>
                                <div class="col-md-4">
                                    <input type="text" name="home_desc_tr" class="form-control" value="{{ setting('home_desc_tr') }}">
                                </div>
                            </div>
    
                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.home_desc_2_ar')</label>
                                <div class="col-md-4">
                                    <input type="text" name="home_desc_2_ar" class="form-control" value="{{ setting('home_desc_2_ar') }}">
                                </div>
                           
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.home_desc_2_en')</label>
                                <div class="col-md-4">
                                    <input type="text" name="home_desc_2_en" class="form-control" value="{{ setting('home_desc_2_en') }}">
                                </div>
                            </div>
    
                        
                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.home_desc_2_tr')</label>
                                <div class="col-md-4">
                                    <input type="text" name="home_desc_2_tr" class="form-control" value="{{ setting('home_desc_2_tr') }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.ar_aboutus')</label>
                                <div class="col-md-10">
                                    <textarea name="ar_aboutus"  placeholder="@lang('dashboard.ar_aboutus')"
                                    class="form-control">{{ setting('ar_aboutus') }}</textarea>

                                </div>


                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.en_aboutus')</label>
                                <div class="col-md-10">
                                    <textarea name="en_aboutus"  placeholder="@lang('dashboard.en_aboutus')"
                                    class="form-control">{{ setting('en_aboutus') }}</textarea>

                                </div>


                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.tr_aboutus')</label>
                                <div class="col-md-10">
                                    <textarea name="tr_aboutus"  placeholder="@lang('dashboard.tr_aboutus')"
                                    class="form-control">{{ setting('tr_aboutus') }}</textarea>

                                </div>


                            </div>
                            <h5>@lang('dashboard.images')</h5>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.website_icon')</label>
                                <div class="col-md-4">
                                    <input type="file" name="icon" class="form-control">

                                </div>

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.website_logo')</label>
                                <div class="col-md-4">
                                    <input type="file" name="logo" class="form-control">

                                </div>

                            </div><br>

                            {{-- <h5>@lang('dashboard.delivery_price')</h5> --}}

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">@lang('dashboard.delivery_price')</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="delivery_price" class="form-control" value="{{ setting('delivery_price') }}"
                                        placeholder="@lang('dashboard.delivery_price')">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">₺</span>
                                        </div>
                                    </div>
                                </div>


                            </div>










                            <button type="submit" class="btn btn-primary fa-pull-{{ app()->getLocale()=='ar' ? 'left': 'right' }}">@lang('dashboard.save')</button>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
@endsection




