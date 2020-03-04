<?php
  use App\Vendors;
?>
@extends('admins.app')

@section('content')

	  @include('common.success')
      @include('common.error')
      @include('common.errorsession')
		
			<form  name="package_create" action="{{route('admin.package.update')}}" method="post">
			{!! csrf_field() !!}
				<div class="form-group">
					<label for="inputEmail">Select Vendor</label>
					<select class="browser-default custom-select" required name='vendor_uuid'>
						
							<option value="{{$vendor->uuid}}"> {{$vendor->vendor_name}} </option>
					
					</select>
				</div>
				<div class="form-group">
					<label for="packageName">Package Name</label>
					<input type="text" value="{{$vendor->package_name}}" class="form-control"  placeholder="Package Name" name='package_name'>
				</div>
				<div class="form-group">
				<label for="packageDescription">Package Description</label>
					<input type="text" value="{{$vendor->package_description}}" class="form-control"  placeholder="Package Description" name='package_description'>
				</div>
				<div class="form-group">
				<label for="packageRates">Package rates</label>
					<input type="number" value="{{$vendor->rates}}" class="form-control"  placeholder="Package Description" name='package_rates'>
				</div>
				<input type="hidden" class="form-control" value="{{$vendor->package_uuid}}" name='package_uuid'>
				@csrf
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>


@endsection
