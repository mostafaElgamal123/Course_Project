@extends('web.dashborad.master')


@section('title','categories')

@section('breadcrumb','categories')

@section('content')


<a href="{{url('/categories/create')}}" class="btn btn-primary">
    add category
</a>
@if($category->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">courses</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $cate)
            <tr id="{{$cate->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$cate->name}}</td>
                <td class="align-middle">
                    <div class="d-flex flex-row flex-wrap w-100">
                        @foreach($cate->courses as $key=>$value)
                        <span class="w-40 m-2">{{$value->title}}</span>
                        @endforeach
                    </div>
                </td>
                <td  class="align-middle">
                    <div class="d-flex align-items-center">
                        <a href="{{url('/categories/'.$cate->slug."/edit")}}" class="btn btn-info ms-2 title_action" data-title="edit"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger deleteRecord ms-2 title_action" data-id="{{ $cate->slug }}" data-title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                    </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $category->links('web.dashborad.pagination.custom') }}
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
            url: `{{url('categories/${rowslug}')}}`,
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