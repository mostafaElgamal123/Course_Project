<!-- Courses Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center position-relative mb-5">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                    <h1 class="display-4">Checkout New Releases Of Our Courses</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($course as $cours)
            <div class="col-lg-4 col-md-6 pb-4">
                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{url('courses/'.$cours->slug)}}">
                    <img class="img-fluid" src="<?php if($cours->image !='back-2_1627326624.webp'): ?>{{asset('storage/'.$cours->image)}} <?php else: ?>{{asset('assets/imgs/'.$cours->image)}} <?php endif; ?>" alt="">
                    <div class="courses-text">
                        <h4 class="text-center text-white px-3">{{$cours->title}}</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <span class="text-white"><i class="fa fa-user mr-2"></i>{{$cours->ctaegories}}</span>
                                <span class="text-white"><i class="fa fa-star mr-2"></i>{{$cours->rating}}
                                    <small>({{$cours->orders->count()}})</small></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12">
                <nav aria-label="Page navigation">
                    {{$course->links('web.front.pagination.paginate')}}
                    </nav>
            </div>
        </div>
    </div>
</div>
<!-- Courses End -->