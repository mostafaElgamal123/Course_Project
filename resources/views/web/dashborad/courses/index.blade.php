<?php use Illuminate\Support\Str; ?>

@extends('web.dashborad.master')


@section('title','Courses')

@section('breadcrumb','Courses')

@section('content')



<a href="{{url('/courses/create')}}" class="btn btn-primary">
    add Courses
</a>
@if($course->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
        <thead class="bg-light">
            <tr>
                <th scope="col">#</th>
                <th  scope="col">title</th>
                <th  scope="col">lectures</th>
                <th  scope="col">Apply Student</th>
                <th  scope="col">price</th>
                <th  scope="col">offer</th>
                <th  scope="col">explanation video</th>
                <th  scope="col">review video</th>
                <th  scope="col">category</th>
                <th  scope="col">status</th>
                <th  scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course as $cour)
                <tr id="{{$cour->id}}">
                    <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                    <td  class="align-middle">{{$cour->title}}</td>
                    <td  class="align-middle">{{$cour->lectures}}</td>
                    <td  class="align-middle">
                        <span class="btn btn-warning text-white w-40 m-2">{{$cour->orders->count()}}</span>
                    </td>
                    <td  class="align-middle">{{$cour->price}}</td>
                    <td  class="align-middle">{{$cour->offer}}</td>
                    <td  class="align-middle"><a href="#!" class="btn btn-primary"><i class="fa fa-link"></i></a></td>
                    <td  class="align-middle"><a href="#!" class="btn btn-primary"><i class="fa fa-link"></i></a></td>
                    <td  class="align-middle">{{$cour->categories->name}}</td>
                    <td  class="align-middle">
                        @if($cour->status=='publish')
                        <span class="badge badge-success w-40 m-2">{{$cour->status}}</span>
                        @else
                        <span class="badge badge-warning w-40 m-2">{{$cour->status}}</span> 
                        @endif
                    </td>
                    <td  class="align-middle">
                    <div class="d-flex align-items-center">
                        <a href="{{url('/titles/'.$cour->slug)}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        <a href="{{url('/orders/'.$cour->slug)}}" class="btn btn-primary ms-2"><i class="fas fa-folder"></i></a>
                        <a href="{{url('/courses/'.$cour->slug."/edit")}}" class="btn btn-info ms-2"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger deleteRecord ms-2" data-id="{{ $cour->slug }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $course->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/courses/"+rowslug,
            method: 'delete',
            data: {
                "_token": "{{ csrf_token() }}",
                rowslug: rowslug
            },
            success: function(result){
                console.log(result);
                alert(result.success);
                $('#'+result.id).remove();
            }
        });
    })
</script>
@endsection