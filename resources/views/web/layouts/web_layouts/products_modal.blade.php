<!-- Modal / Product -->

@foreach ($foods as $food)
<div class="modal fade" id="productModal{{$food->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img  src="{{ $food->getMedia()[0]->getUrl('thumb') }}"  alt="{{ $food->lang_name }}"></div>
                <h4 class="modal-title">@lang('web.specify_your_order')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <label class="mb-0">{{$food->lang_name}}</label>
                        {{-- <span class="text-muted">{{$food->en_desc}}</span> --}}
                    </div>

                </div>
                <div class="row align-items-center">
                    <div class="col-3">
                    
                        <label class="mb-0">@lang('web.Quantity')</label>
                        
                        
                    </div>
                    <div class="col-6 text-center">
                        <div id='myform'>
                            <input type='button' value='-' class='qtyminus p-0' data-foodId="{{$food->id}}" field='quantity' />
                            <input type='text' min="1"  autocomplete="off" data-foodQtyId="{{$food->id}}" name='quantity{{$food->id}}' value='1' class='qty' />
                            <input type='button' value='+' class='qtyplus p-0' data-foodId="{{$food->id}}" field='quantity' />
                        </div>
                        {{-- <button >-</button>
                        
                        <div class="form-group col-sm-6">
                                <input type="number" class="form-control p-1" name="quantity" id="quantity">
                        </div>
                        <button >+</button> --}}

                    </div>

                    <div class="col-3 text-right">
                            <div class="col-3 text-lg text-right foodQty{{$food->id}}">₺{{$food->price}}</div>

                    </div>

                </div>
            </div>
            
            <div class="modal-body panel-details-container">

                @if (count($food->attributes)>0)
                    <div class="panel-details">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio">
                                <input name="radio_title_additions" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                            <a href="#panelDetailsAdditions{{$food->id}}" data-toggle="collapse">@lang('web.Additions')</a>
                        </h5>
                        <div id="panelDetailsAdditions{{$food->id}}" class="collapse">
                            <div class="panel-details-content">
                                <div class="row">
                                    @foreach ($food->attributes as $item)
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="additinos custom-control custom-checkbox">
                                                    <input type="checkbox" autocomplete="off" name="additinos" data-food-attribute="{{$item->id}};{{$item->lang_name}};{{$item->price}}" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">{{$item->lang_name}} (₺{{$item->price}})</span>
                                                </label>
                                            </div>     
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <span class="title">{{$food->lang_desc}}</span>
                    </div>

                </div>
            </div>
            {{-- <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="progress-bar">
                        <div data-size="20" class="progress"></div>
                    </div>
                </div>
            </div> --}}
            
            <button type="button" id="addToCart{{$food->id}}" class="addToCart modal-btn btn btn-secondary btn-block btn-lg"  data-food="{{$food->id}};{{$food->lang_name}};{{$food->lang_desc}};{{$food->price}};{{$food->price}};1" data-dismiss="modal"><span>@lang('web.add_to_cart')</span></button>
        </div>
    </div>
</div>
@endforeach

