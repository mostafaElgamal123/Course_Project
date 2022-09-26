@extends('web.dashborad.master')


@section('title','famous programmers')

@section('breadcrumb','famousprogrammers')

@section('content')


<a href="{{url('/famousprogrammers/create')}}" class="btn btn-primary">
    add famous programmers
</a>
@if($famousprogrammer->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($famousprogrammer as $famousprogramm)
            <tr id="{{$famousprogramm->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="<?php if($famousprogramm->image !='unnamed.jpg'): ?>{{asset('storage/'.$famousprogramm->image)}} <?php else: ?> {{asset('assets/imgs/'.$famousprogramm->image)}} <?php endif; ?>" alt=""></td>
                    <td class="align-middle">
                    <div class="d-flex align-items-center">
                            <a href="{{url('/famousprogrammers/'.$famousprogramm->id."/edit")}}" class="btn btn-info ms-2 title_action" data-title="edit"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger deleteRecord ms-2 title_action" data-title="delete" data-id="{{ $famousprogramm->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                    </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $famousprogrammer->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection
@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: `{{url('famousprogrammers/${rowslug}')}}`,
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