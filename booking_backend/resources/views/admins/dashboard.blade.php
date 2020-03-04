<?php
  use App\Vendors;
?>
@extends('admins.app')

@section('content')

	  @include('common.success')
      @include('common.error')
      @include('common.errorsession')
			@foreach($vendors as $vendor)
					<div class="col-xs-6 col-sm-4 col-md-3" style='margin-top: 1%;margin-top: 5%;'>
						<div class="product-imagewrapper">
							
							<?php  
							$full_img = Vendors::getLogo($vendor->vendor_logo);
							?>
							
							
							<img src="{{$full_img}}" class="img-responsive" ></a>
						</div>

						<div class="product-content-wrapper" style='text-align:left;'>
							<h5>
									{{$vendor->package_name}}</h5>
							
							<span>PHP {{$vendor->rates}} </span>
							
							<div style='display:none;'>
							<form name="add-to-cart" action="{{route('admin.dashboard')}}" method="get" style="margin-top:5px;clear:both;margin-right: 5px;">
								{!! csrf_field() !!}
								<a  class="btn btn-default addcard-new">
								<input type="hidden" value="1" name="quantity" class="qty" />
								<input type="hidden" value="{{$vendor->package_uuid}}" name="id" class="id proid" />
								@csrf
								<span class="item-count"></span>
								<input class='btn-success btn' type="submit" value="Add to Cart" name="add_to_cart" class="add" />
								</a>
							</form>
							<form name="add-to-cart" action="{{route('admin.dashboard')}}" method="get">
								{!! csrf_field() !!}
								<a  class="btn btn-default addcard-new">
								<input type="hidden" value="1" name="quantity" class="qty" />
								<input type="hidden" value="{{$vendor->package_uuid}}" name="id" class="id proid" />
								@csrf
								<span class="item-count"></span>
								<input class='btn-success btn' type="submit" value="BOOK NOW" name="book_now" class="book" />
								
								</a>
							</form>	
							</div>
							<br/>
							<a href='{{route("admin.package.edit", $vendor->package_uuid )}}'>EDIT</a> 
							<a href='{{route("admin.package.delete", $vendor->package_uuid )}}'>DELETE</a>				
						</div>  
					</div>
				@endforeach


@endsection
