@extends('web.dashborad.master')


@section('title','titles')

@section('breadcrumb','titles')

@section('content')

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/titles')}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="description" value="{{old('description')}}" class="form-control">
            </div>
            <div class="mb-3">
                <input type="hidden" name="course_id" value="{{$course->id}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@if($title->isNotEmpty())
@include('web.dashborad.subtitle.index')
@include('web.dashborad.subtitle.create')
<div class="table-responsive pt-4 pb-4 position-relative">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($title as $titl)
            <tr id="{{$titl->id}}">
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$titl->title}}</td>
                <td class="align-middle">
                <div class="d-flex align-items-center">
                        <button class="btn btn-primary item_popper title_action" data-id="{{ $titl->id }}" data-title="add subtitle">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-primary ms-2 item_popper_view title_action" data-id="{{ $titl->id }}" data-title="show subtitle"><i class="fa fa-eye"></i></button>
                        <a href="{{url('/titles/'.$titl->id."/edit")}}" class="btn btn-info ms-2 title_action" data-title="edit"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger deleteRecord ms-2 title_action" data-id="{{ $titl->id }}" data-title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $title->links('web.dashborad.pagination.custom') }}
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
            url: `{{url('titles/${rowslug}')}}`,
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
    $('.item_popper').on('click',function(){
        $('.subtitle').toggleClass('subtitle_active');
        const rowslug=$(this).attr('data-id');
        $('#title_id').val(rowslug);
    })
    $('#submitformsubtitle').on('submit',function(e){
    e.preventDefault();

    const title_id=$('#title_id').val();
    const subtitle=$('#subtitle').val();
    var opSuccess=" ";
    var opError=" ";
    $.ajax({
      url: "{{url('subtitles')}}",
      type:"post",
      data:{
        "_token": "{{ csrf_token() }}",
        title_id:title_id,
        subtitle:subtitle,
      },
      success:function(response){
        if(response){
          $("#submitformsubtitle")[0].reset(); 
          //console.log(data.length);
        opSuccess+='<div class="alert alert-success">'+response.success+'</div>';
        $('.alterSuccessletter').html(" ");
        $('.alterSuccessletter').append(opSuccess);
        }
      },
      error:function(errorsub){
        if(errorsub){
            if(errorsub.responseJSON.errors.subtitle){
                opError+='<div class="alert alert-danger">'+errorsub.responseJSON.errors.subtitle+'</div>';
            }
            $('.alterSuccessletter').html(" ");
            $('.alterSuccessletter').append(opError);
        }
      }
      });
    });
    $('.item_popper_view').on('click',function(){
        $('.subtitleview').toggleClass('subtitleview_active');
        const rowslug=$(this).attr('data-id');
        var op=" ";
        $.ajax({
            url: `{{url('subtitles/${rowslug}')}}`,
            method: 'get',
            data: {
                "_token": "{{ csrf_token() }}",
                rowslug: rowslug
            },
            success: function(result){
                $('#title').text(result.title);
                 for(var i=0;i<result.subtitle.length;i++){
                    op+=`<tr id="sub-${result.subtitle[i].id}">
                                <th scope="row" class="align-middle">${i+1}</th>
                                <td class="align-middle">${result.subtitle[i].subtitle}</td>
                                <td class="align-middle">
                                <div class="d-flex align-items-center parant">
                                        <button class="btn btn-danger deleteRecordsub title_action ms-2" data-id="${result.subtitle[i].id}" data-title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </td>
                         </tr>`;
                 }
                   $('#subtitletobody').html(" ");
				   $('#subtitletobody').append(op);
            }
        });
    })
    $(document).ready(function(){setInterval(function(){
    $('.deleteRecordsub').on('click',function(){
        const rowslug=$(this).attr('data-id');
        console.log(rowslug);
        $.ajax({
            url: `{{url('subtitles/${rowslug}')}}`,
            method: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}",
                rowslug: rowslug
            },
            success: function(result){
                console.log(result);
                alert(result.success);
                $('#sub-'+result.id).remove();
            }
        });
    })}, 3000)});
</script>
@endsection