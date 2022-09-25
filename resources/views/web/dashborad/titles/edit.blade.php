@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')


<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/titles/'.$title->id)}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$title->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="description" id="mytextarea" value="{{$title->description}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">course</label>
                <select name="course_id" value="{{$title->course_id}}" class="form-select">
                    <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($course as $cour)
                    <option value="{{$cour->id}}" @if($title->course_id==$cour->id) selected @endif >{{$cour->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection