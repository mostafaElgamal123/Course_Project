@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('/reviewvideos')}}" class="btn btn-info">
    view review
</a>

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/reviewvideos/'.$review->slug)}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">review video</label>
                <input type="text" name="review_video" value="{{$review->review_video}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$review->slug}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">course</label>
                <select name="course_id" value="{{$review->course_id}}" class="form-select">
                <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($course as $cour)
                    <option value="{{$cour->id}}">{{$cour->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{$review->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection