@extends('web.dashborad.master')


@section('title','users')

@section('breadcrumb','create')

@section('content')

<a href="{{route('users.index')}}" class="btn btn-info">
    view users
</a>




<div class="row pt-4 pb-4">
    <div class="col-md-8 col-xs-12 col-sm-12 mx-auto">
    {!! Form::open(array('route' => 'users.store','method'=>'POST','class'=>'style_form')) !!}
        @include('web.dashborad.layout.message')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-start">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>



@endsection