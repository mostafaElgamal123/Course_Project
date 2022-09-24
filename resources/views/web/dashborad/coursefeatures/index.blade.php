<?php use Illuminate\Support\Str; ?>

@extends('web.dashborad.master')


@section('title','course features')

@section('breadcrumb','course features')

@section('content')



<a href="{{url('/coursefeatures/create')}}" class="btn btn-primary">
    add course features
</a>
@if($coursefeature->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
        <thead class="bg-light">
            <tr>
                <th scope="col">#</th>
                <th  scope="col">title</th>
                <th  scope="col">category</th>
                <th  scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coursefeature as $coursefeat)
                <tr id="{{$coursefeat->id}}">
                    <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                    <td  class="align-middle">{{$coursefeat->title}}</td>
                    <td  class="align-middle">{{$coursefeat->courses->title}}</td>
                    <td  class="align-middle">
                    <div class="d-flex align-items-center">
                        <a href="{{url('/coursefeatures/'.$coursefeat->id."/edit")}}" class="btn btn-info ms-2 title_action" data-title="edit"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger deleteRecord ms-2 title_action" data-id="{{ $coursefeat->id }}" data-title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $coursefeature->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: `{{url('coursefeatures/${rowslug}')}}`,
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