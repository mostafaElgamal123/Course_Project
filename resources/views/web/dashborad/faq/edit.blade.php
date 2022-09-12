@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('/faqs')}}" class="btn btn-info">
    view faqs
</a>

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/faqs/'.$faq->slug)}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">question</label>
                <input type="text" name="question" value="{{$faq->question}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$faq->slug}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">answer</label>
                <input type="text" name="answer" value="{{$faq->answer}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">course</label>
                <select name="course_id" value="{{$faq->course_id}}" class="form-select">
                <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($course as $cour)
                    <option value="{{$cour->id}}">{{$cour->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{$faq->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection