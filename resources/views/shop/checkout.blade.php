@extends('layouts.master')


@section('title')
	Checkout
@stop

@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-3 col-sm-offset-3">
			<h2>Checkout</h1>
			<h4>Your Total:: $ {{ Cart::total() }}</h4>
			<form action="{{ route('product.checkout') }}" method="post" id="payment-form">
                <div class="row">
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                        <span class="payment-errors"></span>
		                            <label for="name">Name</label>
		                            <input type="text" name="name" id="name" class="form-control" required>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="address">Address</label>
		                            <input type="text" name="address" id="address" class="form-control" required>
		                        </div>
		                    </div>
		                    <hr>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-name">Card Holder Name</label>
		                            <input type="text" id="card-name" class="form-control" required>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-number">Credit Card Number</label>
		                            <input type="text" class="form-control" size="20" data-stripe="number">
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="row">
		                            <div class="col-xs-6">
		                                <div class="form-group">
		                                    <label for="card-expiry-month">Expiration Month</label>
		                                    <input type="text" class="form-control" size="2" data-stripe="exp_month">
		                                </div>
		                            </div>
		                            <div class="col-xs-6">
		                                <div class="form-group">
		                                    <label for="card-expiry-year">Expiration Year</label>
		                                    <input type="text" class="form-control" size="2" data-stripe="exp_year">
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-cvc">CVC</label>
		                            <input type="text" class="form-control" size="4" data-stripe="cvc">
		                        </div>
		                    </div>
		                </div>
		                {{ csrf_field() }}
		                <button type="submit" class="btn btn-success">Buy now</button>
		            </form>
		        </div>
		    </div>
		</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="{{ asset('public/js/checkout.js') }}"></script>
@stop