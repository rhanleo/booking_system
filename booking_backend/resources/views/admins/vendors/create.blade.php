<?php
  use App\Vendors;
?>
@extends('admins.app')

@section('content')

	  @include('common.success')
      @include('common.error')
      @include('common.errorsession')
	  <h2>Vendors</h2>
	  <div class="container">
            <div class="row justify-content-center">
				<div class="col-md-3">
                </div>
				<div class="col-md-6">
					<form  name="package_create" action="{{route('admin.vendor.add')}}" method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}
						
						<div class="form-group">
							<label for="vendor_name">Vendor Name</label>
							<input type="text" class="form-control"  placeholder="Vendor Name" name='vendor_name'>
						</div>
						<div class="form-group">
							<label for="vendor_logo">Vendor Logo</label>
							<input type="file" class="form-control"  placeholder="Vendor Logo" name='vendor_logo'>
						</div>
						<div class="form-group">
						<label for="vendor_email">Vendor Email</label>
							<input type="text" class="form-control"  placeholder="Vender Email" name='vendor_email'>
						</div>
						<div class="form-group">
						<label for="vendor_contact">Vendor Contact</label>
							<input type="text" class="form-control"  placeholder="Vender Contact" name='vendor_contact'>
						</div>
						<div class="form-group">
						<label for="vendor_contact">Vendor Note</label>
							<textarea class="form-control"  placeholder="Vender Note" name='vendor_note' rows='5'>
							</textarea>
						</div>
						<input type="hidden" class="form-control"   value='{{$admin->uuid}}' name='admin_uuid'>
						@csrf
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<div class="col-md-3">
                </div>
			</div>		
		</div>

@endsection
