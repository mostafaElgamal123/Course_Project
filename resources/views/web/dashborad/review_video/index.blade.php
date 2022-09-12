@extends('web.dashborad.master')


@section('title','review')

@section('breadcrumb','review')

@section('content')


<a href="{{url('/reviewvideos/create')}}" class="btn btn-primary">
    add review
</a>
@if($review->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">review video</th>
            <th scope="col">course</th>
            <th scope="col">status</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($review as $rev)
        @if($rev->review_video!=null)
            <tr id="{{$rev->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td  class="align-middle"><a href="#!" class="btn btn-primary"><i class="fa fa-link"></i></a></td>
                <td class="align-middle"><span class=" w-40 m-2">{{$rev->courses->title}}</span></td>
                <td class="align-middle">
                        @if($rev->status=='publish')
                        <span class="badge badge-success w-40 m-2">{{$rev->status}}</span>
                        @else
                        <span class="badge badge-warning w-40 m-2">{{$rev->status}}</span> 
                        @endif
                    </td>
                    <td class="align-middle">
                    <div class="d-flex align-items-center">
                            <a href="{{url('/reviewvideos/'.$rev->slug."/edit")}}" class="btn btn-info ms-2"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger deleteRecord ms-2" data-id="{{ $rev->slug }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            url: "http://127.0.0.1:8000/reviewvideos/"+rowslug,
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