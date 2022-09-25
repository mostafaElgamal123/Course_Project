@extends('web.dashborad.master')


@section('title','student samples')

@section('breadcrumb','student samples')

@section('content')


<a href="{{url('/cards/create')}}" class="btn btn-primary">
    add student samples
</a>
@if($card->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col">url</th>
            <th scope="col">rating</th>
            <th scope="col">course</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($card as $car)
            <tr id="{{$car->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{asset('storage/'.$car->image)}}" alt=""></td>
                <td class="align-middle">{{$car->name}}</td>
                <td class="align-middle"><a href="{{$car->url}}" class="btn btn-primary"><i class="fa fa-link"></i></a></td>
                <td class="align-middle">{{$car->rating}}</td>
                <td class="align-middle"><span class=" w-40 m-2">{{$car->courses->title}}</span></td>
                    <td class="align-middle">
                    <div class="d-flex align-items-center">
                            <a href="{{url('/cards/'.$car->id."/edit")}}" class="btn btn-info ms-2 title_action" data-title="edit"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger deleteRecord ms-2 title_action" data-title="delete" data-id="{{ $car->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                    </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $card->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection
@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowslug=$(this).attr('data-id');
        $.ajax({
            url: `{{url('cards/${rowslug}')}}`,
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