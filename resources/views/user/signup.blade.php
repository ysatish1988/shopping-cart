@extends('layouts.master')


@section('title')
	User SignUp
@stop

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>Sign Up</h1>
			<form method="post" action="{{ route('user.signup') }}">
				<div class="form-group{{ $errors->has('email') ? ' has-error':''}}">
					{{ csrf_field() }}
					<label for="email">E-Mail</label>
					<input type="text" name="email" id="email" class="form-control">
					@if ($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error':''}}">
					<label for="Password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					@if ($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<button type="submit" class="btn btn-primary">Sign Up</button>
			</form>
		</div>
	</div>
@stop
