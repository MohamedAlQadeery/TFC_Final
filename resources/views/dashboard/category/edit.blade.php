@extends('layouts.dashboard_layouts.app')

@push('css')
 <link href="{{asset('dashboard_files/plugins/filepond/filepond.css')}}" rel="stylesheet">
 <link href="{{ asset('dashboard_files/plugins/filepond/filepond-plugin-image-preview.css') }}" rel="stylesheet">
@endpush

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.dashboard')</a></li>
      <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">@lang('dashboard.categories')</a></li>
      <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.edit_category')</li>
    </ol>
  </nav>
<div class="row">


    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">@lang('dashboard.edit_category')</h4>


            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <form class="form-horizontal" role="form" action="{{ route('dashboard.categories.update',$category) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')
                        @include('dashboard.partials._errors')

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.ar_name')</label>
                                <div class="col-md-10">
                                    <input type="text" name="ar_name" class="form-control" value="{{ old('ar_name',$category->ar_name) }}" placeholder="@lang('dashboard.ar_name_placeholder')">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.en_name')</label>
                                <div class="col-md-10">
                                    <input type="text" name="en_name" class="form-control" value="{{ old('en_name',$category->en_name) }}" placeholder="@lang('dashboard.en_name_placeholder')">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">@lang('dashboard.tr_name')</label>
                                <div class="col-md-10">
                                    <input type="text" name="tr_name" value="{{ old('tr_name',$category->tr_name) }}" class="form-control"  placeholder="@lang('dashboard.tr_name_placeholder')">
                                </div>
                            </div>





                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">@lang('dashboard.status')</label>
                                <div class="col-md-10">
                                    <select name="status" class="form-control">
                                            <option  disabled selected>@lang('dashboard.choose_status')</option>
                                            <option value="1" {{ $category->status==1 ? 'selected' : '' }}>@lang('dashboard.active')</option>
                                            <option value="2" {{ $category->status==2 ? 'selected' : '' }}>@lang('dashboard.disabled')</option>
                                        </select>

                                </div>
                            </div>



                            {{-- <div class="form-group row">
                                <label class="col-md-2 col-form-label">@lang('dashboard.category_icon')</label>

                                <div class="col-md-4">
                                    <img src="{{ $category->getMedia()[0]->getUrl('thumb') }}">
                                </div>

                                <div class="col-md-4">
                                    <input type="file" name="files[]">
                                </div>
                            </div> --}}

                            <h4>@lang('dashboard.category_icon')</h4>

                            <div class="col-md-12">
                                <img src="{{ $category->getMedia()[0]->getUrl('thumb') }}">
                            </div>
                            <br>

                            <input type="file" name="files[]">



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


@push('js')
<script src="{{asset('dashboard_files/plugins/filepond/filepond-plugin-image-preview.js')}}"></script>
<script src="{{ asset('dashboard_files/plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>

<script src="{{asset('dashboard_files/plugins/filepond/filepond.js')}}"></script>

<script>
     FilePond.registerPlugin(FilePondPluginImagePreview,FilePondPluginFileValidateType);
const inputElement = document.querySelector('input[type="file"]');
const pond = FilePond.create( inputElement );

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
@endpush
