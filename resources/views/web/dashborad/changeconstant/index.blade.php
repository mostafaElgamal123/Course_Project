@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','add constant')

@section('content')


<div class="row pt-4 pb-4">
    
    <div class="col-xl-8 col-12 mx-auto">
        <form class="row g-3 style_form" action="{{url('/changeconstants')}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            <div class="col-md-6 col-12">
                <label class="form-label">button top navbar </label>
                <input type="text" name="enrollnow" value="{{old('enrollnow')}}" class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label">title for all content diploma</label>
                <input type="text" name="title_section_content" value="{{old('title_section_content')}}" class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label">title for small video</label>
                <input type="text" name="title_video1" value="{{old('title_video1')}}" class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label">title for larg video</label>
                <input type="text" name="title_video2" value="{{old('title_video2')}}" class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label">title for review</label>
                <input type="text" name="title_section_review" value="{{old('title_section_review')}}" class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label">title for form</label>
                <input type="text" name="title_form" value="{{old('title_form')}}" class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label">title form offer</label>
                <input type="text" name="title_form_offer" value="{{old('title_form_offer')}}" class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label">submit form content</label>
                <input type="text" name="submit_form" value="{{old('submit_form')}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection