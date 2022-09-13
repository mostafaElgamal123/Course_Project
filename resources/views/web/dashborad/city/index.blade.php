@extends('web.dashborad.master')


@section('title','cities')

@section('breadcrumb','cities')

@section('content')


<a href="{{url('/cities/create')}}" class="btn btn-primary">
    add city
</a>
@if($city->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">city</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($city as $cit)
            <tr id="{{$cit->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$cit->city}}</td>
                <td  class="align-middle">
                    <div class="d-flex align-items-center">
                        <a href="{{url('/cities/'.$cit->id."/edit")}}" class="btn btn-info ms-2 title_action" data-title="edit"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger deleteRecord ms-2 title_action" data-id="{{ $cit->id }}" data-title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                    </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $city->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        console.log(rowslug);
        $.ajax({
            url: `{{url('cities/${rowslug}')}}`,
            method: 'DELETE',
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