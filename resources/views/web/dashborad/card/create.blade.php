@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','add card')

@section('content')

<a href="{{url('/cards')}}" class="btn btn-info">
    view cards
</a>

<div class="row pt-4 pb-4">
    
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/cards')}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" id="" class="form-control" value="{{old('slug')}}" cols="30" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">url</label>
                <input type="url" name="url" value="{{old('url')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">rating</label>
                <input type="text" name="rating" value="{{old('rating')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">course</label>
                <select name="course_id" value="{{old('course_id')}}" class="form-select">
                <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($course as $cour)
                    <option value="{{$cour->id}}">{{$cour->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection