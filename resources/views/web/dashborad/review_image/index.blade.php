@extends('web.dashborad.master')


@section('title','review')

@section('breadcrumb','review')

@section('content')


<a href="{{url('/reviewimages/create')}}" class="btn btn-primary">
    add review
</a>
@if($review->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">review image</th>
            <th scope="col">course</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($review as $rev)
        @if($rev->review_image!=null)
            <tr id="{{$rev->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="<?php if($rev->review_image !='r1_1652729127.webp'): ?>{{asset('storage/'.$rev->review_image)}} <?php else: ?>{{asset('assets/imgs/'.$rev->review_image)}} <?php endif; ?>" alt=""></td>
                <td class="align-middle"><span class=" w-40 m-2">{{$rev->courses->title}}</span></td>
                    <td class="align-middle">
                    <div class="d-flex align-items-center">
                            <a href="{{url('/reviewimages/'.$rev->id."/edit")}}" class="btn btn-info ms-2 title_action" data-title="edit"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger deleteRecord ms-2 title_action" data-title="delete" data-id="{{ $rev->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                    </td>
            </tr>
        @endif
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $review->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection
@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: `{{url('reviewimages/${rowslug}')}}`,
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