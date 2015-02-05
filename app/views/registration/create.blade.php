@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<h1>registration</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'register_path']) }}

		<div class="form-group">
		{{ Form::label('username', 'Username:') }}
		{{ Form::text('username', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('password_confirmation', 'Password Confirmation:') }}
		{{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
		</div>
		
		<div class="form-group">
			{{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
		</div>


		{{ Form::close() }}
	</div>
</div>
@stop
