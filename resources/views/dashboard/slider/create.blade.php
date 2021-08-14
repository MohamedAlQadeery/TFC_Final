@extends('layouts.dashboard_layouts.app')

@push('css')
    {{-- begin page css --}}

 <link href="{{asset('dashboard_files/plugins/filepond/filepond.css')}}" rel="stylesheet">
 <link href="{{ asset('dashboard_files/plugins/filepond/filepond-plugin-image-preview.css') }}" rel="stylesheet">
     {{-- end page css --}}

@endpush

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.dashboard')</a></li>
      <li class="breadcrumb-item"><a href="{{ route('dashboard.sliders.index') }}">@lang('dashboard.sliders')</a></li>
      <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.create_slider')</li>
    </ol>
  </nav>
<div class="row">


    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">@lang('dashboard.create_slider')</h4>


            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <form class="form-horizontal" role="form" action="{{ route('dashboard.sliders.store') }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        @include('dashboard.partials._errors')

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input type="text" name="ar_name" class="form-control" value="{{ old('ar_name') }}" placeholder="@lang('dashboard.ar_name_placeholder')">
                                </div>

                                <div class="col-md-4">
                                    <input type="text" name="en_name" class="form-control" value="{{ old('en_name') }}" placeholder="@lang('dashboard.en_name_placeholder')">
                                </div>

                                <div class="col-md-4">
                                    <input type="text" name="tr_name" class="form-control" value="{{ old('tr_name') }}" placeholder="@lang('dashboard.tr_name_placeholder')">
                                </div>


                            </div>



                            <div class="form-group row">

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.ar_desc')(@lang('dashboard.optional'))</label>
                                <div class="col-md-4">
                                    <textarea name="ar_desc"  placeholder="@lang('dashboard.ar_desc')"
                                    class="form-control">{{ old('ar_desc') }}</textarea>

                                </div>

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.en_desc')(@lang('dashboard.optional'))</label>
                                <div class="col-md-4">
                                    <textarea name="en_desc"  placeholder="@lang('dashboard.en_desc')"
                                    class="form-control">{{ old('en_desc') }}</textarea>

                                </div>


                            </div>




                            <div class="form-group row">

                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.tr_desc')(@lang('dashboard.optional'))</label>
                                <div class="col-md-4">
                                    <textarea name="tr_desc"  placeholder="@lang('dashboard.tr_desc')"
                                    class="form-control">{{ old('tr_desc') }}</textarea>

                                </div>


                                <label class="col-md-2 col-form-label">@lang('dashboard.status')</label>
                                <div class="col-md-4">
                                    <select name="status" class="form-control">
                                            <option  disabled selected>@lang('dashboard.choose_status')</option>
                                            <option value="1" >@lang('dashboard.active')</option>
                                            <option value="2">@lang('dashboard.disabled')</option>
                                        </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">@lang('dashboard.image')</label>

                                <div class="col-md-10">
                                    <input type="file" name="files[]">
                                </div>
                            </div>


                            <button id="sub_btn" type="submit" class="btn btn-primary fa-pull-{{ app()->getLocale()=='ar' ? 'left': 'right' }}" style="display: none">@lang('dashboard.create')</button>

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


@push('js')
    {{-- begin page scripts --}}

<script src="{{asset('dashboard_files/plugins/filepond/filepond-plugin-image-preview.js')}}"></script>
<script src="{{ asset('dashboard_files/plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>

<script src="{{asset('dashboard_files/plugins/filepond/filepond.js')}}"></script>

<script>
     FilePond.registerPlugin(FilePondPluginImagePreview,FilePondPluginFileValidateType);
const inputElement = document.querySelector('input[type="file"]');
const pond = FilePond.create( inputElement );
pond.onprocessfiles = () => {
    $('#sub_btn').css('display', 'block');

        }

FilePond.setOptions({
    acceptedFileTypes: ['image/*'],

    server: {
        process: "{{ route('dashboard.file_upload') }}",



        headers:{
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }

    }
});



</script>
    {{-- end page script --}}

@endpush
