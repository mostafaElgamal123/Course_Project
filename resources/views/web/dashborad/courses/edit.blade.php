@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('/courses')}}" class="btn btn-info">
    view courses
</a>

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form row g-3" action="{{url('/courses/'.$course->slug)}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            @method('put')
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$course->title}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$course->slug}}" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">description</label>
                <textarea name="description" id="mytextarea" class="form-control" cols="30" rows="10">{{$course->description}}</textarea>
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">rating</label>
                <input type="text" name="rating" value="{{$course->rating}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">lectures</label>
                <input type="text" name="lectures" value="{{$course->lectures}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">price</label>
                <input type="text" name="price" value="{{$course->price}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">offer</label>
                <input type="text" name="offer" value="{{$course->offer}}" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">explanation video</label>
                <input type="text" name="explanation_video" value="{{$course->explanation_video}}" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">review video</label>
                <input type="text" name="review_video" value="{{$course->review_video}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$course->image}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">category</label>
                <select name="category_id" value="{{old('category_id')}}" class="form-select coursecategory">
                    <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">status</label>
                <select name="status" value="{{$course->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection