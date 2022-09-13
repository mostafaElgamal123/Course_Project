@extends('web.dashborad.master')


@section('title','users')

@section('breadcrumb','users')

@section('content')


<a href="{{route('users.create')}}" class="btn btn-primary">
    add user
</a>


@if($data->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
  <table class="table table-bordered">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">Email</th>
              <th scope="col">status</th>
              <th scope="col">Roles</th>
              <th scope="col">edit</th>
              <th scope="col">delete</th>
          </tr>
      </thead>
      <tbody>
      @foreach ($data as $key => $user)
        <tr id="{{$user->id}}">
          <td scope="row" class="align-middle">{{$loop->iteration}}</td>
          <td class="align-middle">{{ $user->name }}</td>
          <td class="align-middle">{{ $user->email }}</td>
          <td class="align-middle">
              @if(Cache::has('user-is-online-' . $user->id))
                <span class="badge badge-success w-40 m-2">Online</span>
              @else
                <span class="badge badge-warning w-40 m-2">Offline</span>
              @endif
          </td>
          <td class="align-middle">
            @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
              @endforeach
            @endif
          </td>
          <td class="align-middle">
                <div class="d-flex align-items-center">
                @can('user-edit')
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info title_action ms-2" data-title="edit"><i class="fas fa-edit"></i></a>
                @endcan
                @can('user-delete')
                <button class="btn btn-danger deleteRecord title_action ms-2" data-title="delete" data-id="{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                @endcan
                </div>
          </td>
        </tr>
        @endforeach
     </tbody>
  </table>
</div>
<div class="row pb-4 pt-2">
    <div class="col-12">
        {{ $data->links('web.dashborad.pagination.custom') }}
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowid=$(this).attr('data-id');
        $.ajax({
            url: "http://127.0.0.1:8000/users/"+rowid,
            method: 'delete',
            data: {
                "_token": "{{ csrf_token() }}",
                rowid: rowid
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