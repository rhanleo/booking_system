<?php
  use App\Vendors;
  use Illuminate\Support\Facades\DB;
?>
@extends('admins.app')

@section('content')

	  @include('common.success')
      @include('common.error')
      @include('common.errorsession')
		
				<style>
					table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 100%;
					}

					td, th {
					border: 1px solid #dddddd;
					text-align: left;
					padding: 8px;
					}

					tr:nth-child(even) {
					background-color: #dddddd;
					}
				</style>
				</head>
				<body>
				
				<h2>Vendors</h2>
				<a href='{{route("admin.vendor.create")}}' style='padding:10px;position: absolute;right: 0;padding-top:2px;'>
				<button class='btn btn-success'><h6>Create Vendor</h6></button>
				</a>
						
				
				<table>
				<tr>
					<th>Name</th>
					<th>Logo</th>
					<th>Email</th>
					<th>Contact Number</th>				
					<th>Joined Date</th>
				</tr>
				@foreach( $vendors as $vendor)
				<?php 	
					$full_img = Vendors::getLogo($vendor->vendor_logo);

				?>
				<tr>
					<td> {{$vendor->vendor_name}} </td>
					<td>
					<img src='{{$full_img }}' style='width: 100px' >
					</td>
					<td>{{$vendor->vendor_email}}</td>
					<td>{{$vendor->vendor_contact}}</td>					
					<td>{{$vendor->created_at}}</td>
				</tr>
				@endforeach
				</table>

@endsection
