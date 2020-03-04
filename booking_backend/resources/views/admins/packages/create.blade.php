<?php
  use App\Vendors;
?>
@extends('admins.app')

@section('content')

	  @include('common.success')
      @include('common.error')
      @include('common.errorsession')
		
			<form  name="package_create" action="{{route('admin.package.add')}}" method="post">
			{!! csrf_field() !!}
				<div class="form-group">
					<label for="inputEmail">Select Vendor</label>
					<select class="browser-default custom-select" required name='vendor_uuid'>
						<option selected>Select</option>
						@foreach($vendors as $vendor)
							<option value="{{$vendor->uuid}}"> {{$vendor->vendor_name}} </option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="packageName">Package Name</label>
					<input type="text" class="form-control"  placeholder="Package Name" name='package_name'>
				</div>
				<div class="form-group">
				<label for="packageDescription">Package Description</label>
					<input type="text" class="form-control"  placeholder="Package Description" name='package_description'>
				</div>
				<div class="form-group">
				<label for="packageRates">Package rates</label>
					<input type="number" class="form-control"  placeholder="Package Description" name='package_rates'>
				</div>
				
				@csrf
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>


@endsection
