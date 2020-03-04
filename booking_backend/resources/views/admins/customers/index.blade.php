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

				<h2>Customers</h2>

				<table>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Joined Date</th>
					<th>Total Spent</th>
				</tr>
				@foreach( $customers as $customer)
				<?php 	
					$total = DB::table('orders')
					->select( DB::raw('SUM(orders.order_amount) as total_amount'))
					->where('orders.customer_uuid', $customer->uuid)
					->get()->first();
					$total = $total->total_amount;
					if ($total < 1){
						$total = '0.00';
					}

				?>
				<tr>
					<td> {{$customer->name}} </td>
					<td>{{$customer->email}}</td>
					<td>{{$customer->created_at}}</td>
					<td>USD {{$total}}</td>
				</tr>
				@endforeach
				</table>

@endsection
