@extends('layouts.master')


@section('title')
	Shopping Cart
@stop



@section('content')
	<div class="row">
		<div class="col-sm-6 col-md 6 col-md-offset-3 col-sm-offset-3">
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Title</th>
			        <th>Quantity</th>
			        <th>Price</th>
			      </tr>
			    </thead>
			    <tbody>
			      @if (Cart::cartQuantity(false))
			      	@foreach (Cart::contents() as $items)
			      		<tr>
					        <td>{{$items->name }}</td>
					        <td>{{ $items->quantity }}</td>
					        <td>{{ $items->subtotal }}</td>
					    </tr>
			      	@endforeach
			      @else
					<tr>
					    <td>Empty..!!</td>
					</tr>
			      @endif		
			    </tbody>
			</table>
			<hr>
			<label>Total Price::</label>
			<span help-block>{{ Cart::total() }}</span>
			<a href="{{ route('product.checkout') }}" class="btn btn-primary pull-right">Checkout</a>
		</div>
	</div>
@stop