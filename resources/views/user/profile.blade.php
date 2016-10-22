@extends('layouts.master')


@section('title')
	User Profile
@stop

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>User Profile</h1><hr>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    Your Orders
			  </div>
			  @if (count($orders)>0)
			  	@foreach ($orders as $order)
			  		<div class="panel-body">
	  					<table class="table table-striped">
						    <thead>
						      <tr>
						        <th>Name</th>
						        <th>Quantity</th>
						        <th>Total</th>
						        <th>Order Date</th>
						      </tr>
						    </thead>
						    <tbody>
						    @foreach (json_decode($order->cart,true) as $element)
						      <tr>
						        <td>{{$element['name']}}</td>
						        <td>{{$element['quantity']}}</td>
						        <td>$ {{$element['subtotal']}}</td>
						        <td>{{ date('Y-m-d',strtotime($order->created_at)) }}</td>
						      </tr>
						    @endforeach  
						    </tbody>
						</table>
					</div>
			  	@endforeach
			  @else
					<div class="panel-body">
	  					No Orders..!!
					</div>
			  @endif
			  <div class="panel-footer">Panel footer</div>
			</div>
		</div>
	</div>
@stop
