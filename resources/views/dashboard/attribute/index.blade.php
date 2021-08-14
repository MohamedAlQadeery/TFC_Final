@extends('layouts.dashboard_layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.dashboard')</a></li>
      <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.attributes')</li>
    </ol>
  </nav>




<div class="row">
    <div class="col-md-12">

        <div class="card-box">
            <h4 class="header-title">@lang('dashboard.search')</h4>
            <form>
                <div class="row">
                 <div class="col-md-4">
                     <input autofocus type="text" name="search" placeholder="@lang('dashboard.attribute_search')" class="form-control">
                 </div>

                 <div class="col-md-4">
                     <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('dashboard.search')</button>


                     <a href="{{route('dashboard.attributes.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>@lang('dashboard.add')</a>

                     @if ($is_searched)
                     <a href="{{route('dashboard.attributes.index')}}" class="btn btn-danger"><i class=" fas fa-arrow-right "></i>@lang('dashboard.cancel')</a>

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
            @if ($attributes->count() > 0)
            <h4 class="header-title">@lang('dashboard.attributes')</h4>


<div class="table-responsive">
    <table class="table mb-0">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>@lang('dashboard.name')</th>
                <th>@lang('dashboard.price')</th>
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

            @foreach ($attributes as $index=>$attribute)
            <tr>
                <th scope="row">{{ ++$index }}</th>
                <td>{{ $attribute->dashlang_name }}</td>
                <td>₺{{ $attribute->price }}</td>

                <td>
                    <a href="{{ route('dashboard.attributes.edit',$attribute) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>@lang('dashboard.edit')</a>

                    <form method="post" action="{{ route('dashboard.attributes.destroy',$attribute) }}" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>@lang('dashboard.delete')</button>
                    </form><!-- end of form -->



                </td>
            </tr>
        @endforeach

    </tbody>
</table>
{{ $attributes->appends(request()->query())->links() }}
</div>
@else
<h1 class="text-danger">@lang('dashboard.no_data')</h1>
@endif
        </div>
      </div>
  </div>




@endsection

