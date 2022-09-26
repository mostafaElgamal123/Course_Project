@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('/courses')}}" class="btn btn-info">
    view courses
</a>

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form row g-3" action="{{url('/courses')}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{old('slug')}}" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">description</label>
                <textarea name="description" id="mytextarea1" class="form-control mytextarea1" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">course feature</label>
                <textarea name="coursefeatures" id="mytextarea2" class="form-control mytextarea1" cols="30" rows="10">{{old('coursefeatures')}}</textarea>
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">rating</label>
                <input type="text" name="rating" value="{{old('rating')}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">lectures</label>
                <input type="text" name="lectures" value="{{old('lectures')}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">price</label>
                <input type="text" name="price" value="{{old('price')}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">offer</label>
                <input type="text" name="offer" value="{{old('offer')}}" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">explanation video</label>
                <input type="text" name="explanation_video" value="{{old('explanation_video')}}" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">review video</label>
                <input type="text" name="review_video" value="{{old('review_video')}}" class="form-control">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
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
                <select name="status" value="{{old('status')}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection