@extends('layouts.default')

@section('content')
	<div class="jumbotron">
		<h1>Welcome to Larabook.</h1>
		<p class="lead">A chance to refine your ideas of what a developed application <em>should be</em>.</p>
		{{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-lg btn-primary']) }}
	</div>
	<div class="col-sm-6 animated idle">
		<ul class="nav">
			<li>
				<a href="#">a hidden realm</a>
			</li>
		</ul>
	</div>
@stop
