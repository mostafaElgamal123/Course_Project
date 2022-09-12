@extends('web.dashborad.master')


@section('title','FAQ')

@section('breadcrumb','FAQ')

@section('content')


<a href="{{url('/faqs/create')}}" class="btn btn-primary">
    add faq
</a>
@if($faq->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">question</th>
            <th scope="col">answer</th>
            <th scope="col">course</th>
            <th scope="col">status</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faq as $fa)
            <tr id="{{$fa->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{ Str::limit($fa->question, 30) }}</td>
                <td class="align-middle">
                  {{ Str::limit($fa->answer, 20) }}
                </td>
                <td class="align-middle">{{$fa->courses->title}}</td>
                <td class="align-middle">
                    @if($fa->status=='publish')
                      <span class="badge badge-success w-40 m-2">{{$fa->status}}</span>
                    @else
                      <span class="badge badge-warning w-40 m-2">{{$fa->status}}</span> 
                    @endif
                </td>
                <td class="align-middle">
                <div class="d-flex align-items-center">
                        <a href="{{url('/faqs/'.$fa->slug."/edit")}}" class="btn btn-info ms-2"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger deleteRecord ms-2" data-id="{{ $fa->slug }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $faq->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection


@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/faqs/"+rowslug,
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