@extends('layouts.dashboard_layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.dashboard')</a></li>
      <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.foods')</li>
    </ol>
  </nav>




<div class="row">
    <div class="col-md-12">

        <div class="card-box">
            <h4 class="header-title">@lang('dashboard.search')</h4>
            <form>
                <div class="row">
                 <div class="col-md-3">
                     <input autofocus type="text" name="search" placeholder="@lang('dashboard.food_search')" class="form-control">
                 </div>

                 <div class="col-md-3">
                     <select id="category_search" name="category" class="form-control">
                       <option selected disabled>@lang('dashboard.category_search')</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ app()->getLocale()=='ar' ? $category->ar_name:$category->en_name }}</option>
                        @endforeach

                     </select>
                 </div>

                 <div class="col-md-3">
                    <select name="status" class="form-control">
                      <option selected disabled>@lang('dashboard.status_search')</option>

                        <option value="1">@lang('dashboard.active')</option>
                         <option value="2">@lang('dashboard.disabled')</option>

                    </select>
                </div>

                 <div class="col-md-3">
                     <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('dashboard.search')</button>


                     <a href="{{route('dashboard.foods.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>@lang('dashboard.add')</a>

                     @if ($is_searched)
                     <a href="{{route('dashboard.foods.index')}}" class="btn btn-danger"><i class=" fas fa-arrow-right "></i>@lang('dashboard.cancel')</a>

                     @endif
                 </div>

                </div>

             </form>
        </div>
      </div>

</div>
  <div class="row">
      <div class="col-md-12">
        <div class="card-box">
            @if ($foods->count() > 0)
            <h4 class="header-title">@lang('dashboard.foods')</h4>


<div class="table-responsive">
    <table class="table mb-0">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>@lang('dashboard.image')</th>
                <th>@lang('dashboard.name')</th>
                <th>@lang('dashboard.category')</th>
                <th>@lang('dashboard.status')</th>
                <th>@lang('dashboard.action')</th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr> --}}

            @foreach ($foods as $index=>$food)
            <tr>
                <th scope="row">{{ ++$index }}</th>
                <td><img src="{{ $food->getMedia()[0]->getUrl('thumb') }}"  alt="{{ $food->name }}" height="75px"></td>
                <td>{{ $food->dashlang_name }}</td>
                <td>{{ app()->getLocale() =='ar' ? $food->category->ar_name : $food->category->en_name}}</td>

                <td><span class="badge badge-{{ $food->status==1 ?'success':'danger' }}" style="font-size:100%">
                     {{ $food->status_name }}</span></td>

                <td>
                    <a href="{{ route('dashboard.foods.edit',$food) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>@lang('dashboard.edit')</a>

                    <form method="post" action="{{ route('dashboard.foods.destroy',$food) }}" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>@lang('dashboard.delete')</button>
                    </form><!-- end of form -->



                </td>
            </tr>
        @endforeach

    </tbody>
</table>
{{ $foods->appends(request()->query())->links() }}
</div>

@else
<h1 class="text-danger">@lang('dashboard.no_data')</h1>
@endif
        </div>

      </div>
  </div>




@endsection

@push('js')
<script>
    $(document).ready(function(){
        $("#category_search").select2();

});
</script>

@endpush
