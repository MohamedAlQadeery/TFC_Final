@extends('layouts.dashboard_layouts.app')



@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.dashboard')</a></li>
      <li class="breadcrumb-item"><a href="{{ route('dashboard.attributes.index') }}">@lang('dashboard.attributes')</a></li>
      <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.create_attribute')</li>
    </ol>
  </nav>
<div class="row">


    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">@lang('dashboard.create_attribute')</h4>


            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <form class="form-horizontal" role="form" action="{{ route('dashboard.attributes.store') }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        @include('dashboard.partials._errors')


                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.ar_name')</label>
                                <div class="col-md-4">
                                    <input type="text" name="ar_name" class="form-control" value="{{ old('ar_name') }}" placeholder="@lang('dashboard.ar_name_placeholder')">
                                </div>

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.en_name')</label>
                                <div class="col-md-4">
                                    <input type="text" name="en_name" class="form-control" value="{{ old('en_name') }}" placeholder="@lang('dashboard.en_name_placeholder')">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.tr_name')</label>
                                <div class="col-md-4">
                                    <input type="text" name="tr_name" value="{{ old('tr_name') }}" class="form-control"  placeholder="@lang('dashboard.tr_name_placeholder')">
                                </div>

                                <label class="col-md-2 col-form-label">@lang('dashboard.price')</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="@lang('dashboard.price')">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">₺</span>
                                        </div>
                                    </div>
                                </div>
                            </div>









                            <button type="submit" class="btn btn-primary fa-pull-{{ app()->getLocale()=='ar' ? 'left': 'right' }}">@lang('dashboard.create')</button>

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




