@extends('web.dashborad.master')


@section('title','order')

@section('breadcrumb','order')

@section('content')
@if($order->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">phone</th>
            <th scope="col">email</th>
            <th scope="col">city</th>
            <th scope="col">educational qualification</th>
            <th scope="col">course</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $ord)
            <tr id="{{$ord->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$ord->name}}</td>
                <td class="align-middle">{{$ord->phone}}</td>
                <td class="align-middle">{{$ord->email}}</td>
                <td class="align-middle">{{$ord->city}}</td>
                <td class="align-middle">{{$ord->educational_qualification}}</td>
                <td class="align-middle">{{$ord->Courses->title}}</td>
                <td class="align-middle">
                <button class="btn btn-danger deleteRecord title_action" data-title="delete" data-id="{{ $ord->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $order->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowsid=$(this).attr('data-id');
        $.ajax({
            url: `{{url('orders/${rowsid}')}}`,
            method: 'delete',
            data: {
                "_token": "{{ csrf_token() }}",
                rowsid: rowsid
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