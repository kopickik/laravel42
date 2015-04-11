@extends('layouts.default')

@section('content')
	<div class="jumbotron">
		<h1>Welcome to Larabook.</h1>
		<p class="lead">A chance to refine your ideas of what a developed application <em>should be</em>.</p>
		@if (Auth::guest())
		  {{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-lg btn-primary']) }}
		@endif
	</div>
	@if ($currentUser)
	<div class="col-sm-6 animated idle">
		<ul class="nav">
			<li>
				<a href="#">a hidden realm</a>
			</li>
		</ul>
	</div>
	<div class="profile col-sm-6">
		<h3>{{ $currentUser['email'] }}'s profile</h3>
		<dl>
			<dt>{{ $currentUser['password'] }}</dt>
			<dd>Blah Blah blah</dd>
		</dl>
	</div>
	@endif
@stop
