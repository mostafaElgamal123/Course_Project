@extends('web.dashborad.master')


@section('title','users')

@section('breadcrumb','edit')

@section('content')


<a href="{{route('users.index')}}" class="btn btn-info">
    view users
</a>




<div class="row pb-4 pt-4">
    <div class="col-md-8 col-xs-12 col-sm-12 mx-auto">
    {!! Form::model($user, ['method' => 'PATCH','class'=>'style_form','route' => ['users.update', $user->id]]) !!}
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
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-start">
            <button type="submit" class="btn btn-primary mt-2">update</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>



@endsection