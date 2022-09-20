@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','update card')

@section('content')

<a href="{{url('/cards')}}" class="btn btn-info">
    view cards
</a>

<div class="row pt-4 pb-4">
    
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/cards/'.$card->id)}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{$card->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" id="" class="form-control" cols="30" rows="5">{{$card->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">url</label>
                <input type="url" name="url" value="{{$card->url}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">rating</label>
                <input type="text" name="rating" value="{{$card->rating}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$card->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">course</label>
                <select name="course_id" value="{{$card->course_id}}" class="form-select">
                <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($course as $cour)
                    <option value="{{$cour->id}}"@if($cour->id==$card->course_id) selected @endif>{{$cour->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection