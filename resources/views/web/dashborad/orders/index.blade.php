@extends('web.dashborad.master')


@section('title','order')

@section('breadcrumb','order')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form id="filter_form" action="{{url('orders')}}" method="get">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Start</label>
                                    <input type="date" name="start" value="{{old('start')}}" id="form6Example1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">End</label>
                                    <input type="date" name="end" value="{{old('end')}}" id="form6Example1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Course</label>
                                    <select class="form-select" name="course" value="{{old('course')}}" aria-label="Default select example" placeholder="Select Course">
                                        <option selected></option>
                                        @foreach($course as $cou)
                                        <option value="{{$cou->id}}">{{$cou->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">City</label>
                                    <select class="form-select" name="city" value="{{old('city')}}" aria-label="Default select example" placeholder="Select City">
                                        <option selected></option>
                                        @foreach($city as $ci)
                                        <option value="{{$ci->id}}">{{$ci->city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Search</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
            <th scope="col">order date</th>
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
                <td class="align-middle">{{$ord->cities->city}}</td>
                <td class="align-middle">{{$ord->educational_qualification}}</td>
                <td class="align-middle">{{$ord->Courses->title}}</td>
                <td class="align-middle">{{date('Y-m-d H:i:s', strtotime($ord->order_date)) }}</td>
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
@else
<div class="row pb-4 pt-2">
    <div class="col-12">
        <h1>not found</h1>
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    $('.deleteRecord').on('click',function(){
        const rowsid=$(this).attr('data-id');
        $.ajax({
            url:   `{{url('orders/${rowsid}')}}`,
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