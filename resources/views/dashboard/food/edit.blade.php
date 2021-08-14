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
      <li class="breadcrumb-item"><a href="{{ route('dashboard.foods.index') }}">@lang('dashboard.foods')</a></li>
      <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.edit_food')</li>
    </ol>
  </nav>
    <!-- Form row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">@lang('dashboard.edit_food')</h4>
                <p class="text-muted mb-3 font-13">
                    @lang('dashboard.edit_food_desc')
                </p>
                @include('dashboard.partials._errors')

                <form action="{{ route('dashboard.foods.update',$food) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="col-form-label">@lang('dashboard.ar_name')</label>
                            <input type="text" name="ar_name" value="{{ old('ar_name',$food->ar_name) }}" class="form-control"  placeholder="@lang('dashboard.ar_name_placeholder')">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4" class="col-form-label">@lang('dashboard.en_name')</label>
                            <input type="text" name="en_name" class="form-control" value="{{ old('en_name',$food->en_name) }}" placeholder="@lang('dashboard.en_name_placeholder')">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4" class="col-form-label">@lang('dashboard.tr_name')</label>
                            <input type="text" name="tr_name" class="form-control" value="{{ old('tr_name',$food->tr_name) }}" placeholder="@lang('dashboard.tr_name_placeholder')">
                        </div>
                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label class="col-form-label">@lang('dashboard.categories')</label>
                            <select id="choose_category" name="category_id" class="form-control">
                                <option selected disabled>@lang('dashboard.choose_category')</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $food->category->id == $category->id ? 'selected' : '' }}>
                                        {{ app()->getLocale()=='ar' ? $category->ar_name:$category->en_name }}</option>
                                @endforeach

                                </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label  class="col-form-label">@lang('dashboard.status')</label>
                            <select name="status" class="form-control">
                                <option  disabled selected>@lang('dashboard.choose_status')</option>
                                <option value="1" {{ $food->status == 1 ? 'selected' : '' }}>@lang('dashboard.active')</option>
                                <option value="2" {{ $food->status ==2 ? 'selected' : '' }}>@lang('dashboard.disabled')</option>

                                </select>
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label  class="col-form-label">@lang('dashboard.ar_desc') (@lang('dashboard.optional'))</label>
                        <textarea name="ar_desc"  placeholder="@lang('dashboard.food_desc')"  class="form-control">{{ old('ar_name',$food->ar_desc) }}</textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label  class="col-form-label">@lang('dashboard.en_desc') (@lang('dashboard.optional'))</label>
                        <textarea name="en_desc"  placeholder="@lang('dashboard.food_desc')"  class="form-control">{{ old('en_name',$food->en_desc) }}</textarea>
                        </div>


                        <div class="form-group col-md-4">
                            <label  class="col-form-label">@lang('dashboard.tr_desc') (@lang('dashboard.optional'))</label>
                        <textarea name="tr_desc"  placeholder="@lang('dashboard.food_desc')"  class="form-control">{{ old('tr_desc',$food->tr_desc) }}</textarea>
                        </div>
                    </div>

                    <h4>@lang('dashboard.attribute') (@lang('dashboard.optional'))</h4>

                    <div class="form row">

                        <div class="form-group col-md-6">
                            <label  class="col-form-label">@lang('dashboard.attributes')</label>
                            <select id="choose_attributes" name="attributes[]"  class="form-control"  multiple>
                                <option  disabled >@lang('dashboard.choose_attributes')</option>

                                @foreach ($attributes as $attr)
                                <option value="{{ $attr->id }}" {{ in_array($attr->id,$food_attributes) ? 'selected' : '' }}>
                                    {{ app()->getLocale()=='ar' ? $attr->ar_name:$attr->en_name }}</option>
                                @endforeach
                                </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label  class="col-form-label">@lang('dashboard.price')</label>

                            <div class="input-group">
                                <input type="text" name="price" class="form-control" value="{{ old('price',$food->price) }}" placeholder="@lang('dashboard.price')">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">₺</span>
                                </div>
                            </div>
                        </div>
                    </div><br>


                    <h4>@lang('dashboard.calories') </h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="col-form-label">@lang('dashboard.fats') (@lang('dashboard.optional'))</label>
                            <input type="text" name="fats" value="{{ old('fats',$food->fats) }}" class="form-control"  placeholder="@lang('dashboard.ar_name_placeholder')">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="col-form-label">@lang('dashboard.carbs') (@lang('dashboard.optional'))</label>
                            <input type="text" name="carbs" value="{{ old('carbs',$food->carbs) }}" class="form-control"  placeholder="@lang('dashboard.ar_name_placeholder')">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="col-form-label">@lang('dashboard.protein') (@lang('dashboard.optional'))</label>
                            <input type="text" name="protein" value="{{ old('protein',$food->protein) }}" class="form-control"  placeholder="@lang('dashboard.ar_name_placeholder')">
                        </div>
                    </div>



                    <h4>@lang('dashboard.image')</h4>

                    <div class="col-md-12">
                        <img src="{{ $food->getMedia()[0]->getUrl('thumb') }}">
                    </div><br>

                            <input type="file" name="files[]">





                            <button type="submit" class="btn btn-primary fa-pull-{{ app()->getLocale()=='ar' ? 'left': 'right' }}">@lang('dashboard.save')</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection


@push('js')
    {{-- begin page scripts --}}

<script src="{{asset('dashboard_files/plugins/filepond/filepond-plugin-image-preview.js')}}"></script>
<script src="{{ asset('dashboard_files/plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{asset('dashboard_files/plugins/filepond/filepond.js')}}"></script>

<script>



$(document).ready(function(){
        $("#choose_category").select2();
        $("#choose_attributes").select2();


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
});

</script>
    {{-- end page script --}}

@endpush
