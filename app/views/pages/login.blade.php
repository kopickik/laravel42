@extends('layouts.default')

@section('content')
    @if ($currentUser)
        <div class="alert alert-success">You're already logged in.</div>
    @endif
    <div class="row">
    <div class="col-sm-6">
        <h1>login</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'login_path']) }}

        <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', null, ['class' => 'form-control']) }}
        </div>
        
        <div class="form-group">
            {{ Form::submit('Sign in', ['class' => 'btn btn-primary']) }}
        </div>


        {{ Form::close() }}
    </div>
</div>
@stop
