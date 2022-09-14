<!-- Start header  -->
<div class="landing">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="text-center">
					<h1 class="rounded-pill p-3 fw-bolder text-white">
						{{$course->title}}
					</h1>
					<a href="#form"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
						  {{$changeconstant->enrollnow}}
					</a>
					<?php echo $course->description; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end header  -->

<!-- Start section1 -->

<section dir="ltr" class="bg-1">	
	<div class="pt-5 pb-5 container">
		<div class="row g-4 align-self-stretch">
			<div class="col-12">
				<h3 class="text-center p-2">{{$changeconstant->title_section_content}}</h3>
			</div>
			@foreach($course->titles as $title)
			<div class="col-md-4 col-sm-6 col-12 mb-3 d-flex">
				<div class="card_box">
					<h3><strong>{{$title->title}}</strong></h3>
					<ul class="list-unstyled px-0">
						@foreach($title->subtitles as $subtitle)
						<li><i class="fas fa-check text-light bg-primary ms-2"></i>{{$subtitle->subtitle}}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endforeach
		</div>
		
		<div class="text-center pb-5 pt-5">
			<a href="#form"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
			{{$changeconstant->enrollnow}}
			</a>
		</div>
	</div>
</section>
<!-- End section1 -->

		<!-- Start section2 -->
		<section class="bg-2 review">
			<div class="container">
				<div class="row sec-vedio">
					<div class="col-lg-6 col-md-12">
						<?php echo $course->review_video; ?>
					</div>
					<div class="col-lg-6 col-md-12">
						<h2 class="text-primary p-2 text-center">{{$changeconstant->title_video1}}</h2>
					</div>
				</div>

				<div class="pt-5 pb-5">
					<h2 class="text-center pt-3 pb-3 text-primary fw-bold">
					{{$changeconstant->title_video2}}
					</h2>
					<div class="row">
						<div class="col-md-10 col-12 mx-auto">
							<?php  echo $course->explanation_video; ?>
						</div>
					</div>
				</div>
			</div>
		</section>		
		<!-- End section2 -->


		<!-- start accordion  -->
		<section class="bg-1 faq">
			<div class="container">
				<div class="text-center pb-2">
					<a href="#form"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
					{{$changeconstant->enrollnow}}
					</a>
					</div>
					<div class="accordion" id="accordionExample">
					@foreach($course->faqs as $faq)
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne{{$faq->id}}">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
								{{$faq->question}}
							</button>
							</h2>
							<div id="collapse{{$faq->id}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								{{$faq->answer}}
							</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</section>
		<!-- end accordion  -->

	   
		<!-- End section3 -->

		<!-- Start section4 -->
		
			<section class="bg-2 review">
					<div class="sec4 text-center pb-5 pt-5 ">
						<h2 class="fw-bolder text-primary">
						{{$changeconstant->title_section_review}}
						</h2>
						<span><i class="fas fa-star"></i></span>
						<span><i class="fas fa-star"></i></span>
						<span><i class="fas fa-star"></i></span>
						<span><i class="fas fa-star"></i></span>
						<span><i class="fas fa-star"></i></span>
					</div>
				<!-- End section4 -->

					<!-- start section5 -->
					<div class="container">
						<div class="row pb-5">
							@foreach($course->reviews as $review)
							@if($review->review_video!=null)
							<div class="col-lg-3 col-md-6 col-12">
								<?php echo $review->review_video; ?>
							</div>
							@endif
							@endforeach
						</div>
					</div>
					<!-- End section5 -->
					<!-- start section6 -->
					<div class="container">
						<div class="text-center pb-5">
								<a href="#form"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
								{{$changeconstant->enrollnow}}
						</a>
						</div>
						<div class="row pb-5 pt-5">
						@foreach($course->reviews as $review)
						@if($review->review_image!=null)
							<div class="col-lg-4 col-md-6 col-12">
							<img src="{{asset('storage/'.$review->review_image)}}">
							</div>
							@endif
						@endforeach
						</div>
					</div>
			</section>
			<!-- end section6 -->

	         <!-- Start section7 -->
			 <section class="bg-1 faq">
				<div class="container">
					<!-- Display the countdown timer in an element -->
						<h1 class="rounded-pill p-3 fw-bolder text-primary text-center">
						{{$changeconstant->title_form_offer}} {{$course->price}} جنيه بدلا من <?php echo($course->price+$course->offer); ?>
						</h1>
						<!-- end section7 -->
						<!-- start footer -->
						<section id="form" class="border border-primary mb-2 p-4">
							<p class="fw-bolder text-center">   {{$changeconstant->enrollnow}}  </p>
								<div class="row g-3 align-self-stretch">
								<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 d-flex">
										<form  id="OrderForm" class="w-100 ">
											<div class="alterSuccess">

											</div>
											<div id="ring_apply" class="ring">
											<span></span>
											</div>
											<div class="mb-3">
												<label for="exampleInputEmail1" class="form-label">الاسم <span style="color:red; font-size:25px;">*</span></label>
												<input type="text" id="name" class="form-control border-dark" id="exampleInputEmail1" aria-describedby="emailHelp">
												<div class="alterError1"></div>
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label">الرقم <span style="color:red; font-size:25px;">*</span></label>
												<input type="text" id="phone" class="form-control border-dark" id="exampleInputPassword1">
												<div class="alterError2"></div>
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label">البريد الالكتروني <span style="color:red; font-size:25px;">*</span></label>
												<input type="email" id="email" class="form-control border-dark" id="exampleInputPassword1">
												<div class="alterError3"></div>
											</div>
											<div class="mb-3">
												<label class="form-label">المحافظه <span style="color:red; font-size:25px;">*</span></label>
												<select id="city_id" name="city_id" value="{{old('city_id')}}" class="form-select border-dark ">
													<option value="0" disabled="true" selected="true">-Select-</option>
													@foreach($city as $cit)
													<option value="{{$cit->id}}">{{$cit->city}}</option>
													@endforeach
												</select>
												<div class="alterError4"></div>
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label"> المؤهل الدراسي <span style="color:red; font-size:25px;">*</span></label>
												<input type="text" id="educational_qualification" class="form-control border-dark" id="exampleInputPassword1">
												<div class="alterError5"></div>
											</div>
											<input type="hidden" id="course_id" value="{{$course->id}}" class="form-control border-dark" id="exampleInputPassword1">
											<button type="submit" class="btn w-100 btn-primary">{{$changeconstant->submit_form}} </button>
										</form>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 d-flex">
										<div class="form_image">
											<img src="{{asset('storage/'.$course->image)}}" alt="">
										</div>
									</div>
								</div>

						</section>
						<!-- end footer -->
				</div>
			 </section>
			 <footer>
				<div class="copyriht text-center">
					 2022 All Rights Reserved. Developed By  © <a href="https://www.eraasoft.com"><strong>EraaSoft</strong></a>
				</div>
			 </footer>
<script>
  $('#OrderForm').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let phone = $('#phone').val();
    let email = $('#email').val();
	let city_id = $('#city_id').val();
    let educational_qualification = $('#educational_qualification').val();
    let course_id = $('#course_id').val();
    var opSuccess=" ";
    var opError1=" ";
	var opError2=" ";
	var opError3=" ";
	var opError4=" ";
	var opError5=" ";
    $.ajax({
      url: "{{url('orders')}}",
      type:"post",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        phone:phone,
        email:email,
		city_id:city_id,
        educational_qualification:educational_qualification,
        course_id:course_id,
      },
      success:function(response){
        if(response){
          $("#OrderForm")[0].reset(); 
          //console.log(data);
        opSuccess+='<div class="alert alert-success">'+response.success+'</div>';
		$('.alterError1').html(" ");
		$('.alterError2').html(" ");
		$('.alterError3').html(" ");
		$('.alterError4').html(" ");
		$('.alterError5').html(" ");
        $('.alterSuccess').html(" ");
        $('.alterSuccess').append(opSuccess);
        }
      },
      error:function(error3){
        if(error3){
            if(error3.responseJSON.errors.email){
                opError1+='<div class="alert alert-danger pt-1 pb-1">'+error3.responseJSON.errors.email+'</div>';
            }
            if(error3.responseJSON.errors.educational_qualification){
                opError2+='<div class="alert alert-danger pt-1 pb-1">'+error3.responseJSON.errors.educational_qualification+'</div>';
            }
            if(error3.responseJSON.errors.name){
                opError3+='<div class="alert alert-danger pt-1 pb-1">'+error3.responseJSON.errors.name+'</div>';
            }
            if(error3.responseJSON.errors.phone){
                opError4+='<div class="alert alert-danger pt-1 pb-1">'+error3.responseJSON.errors.phone+'</div>';
            }
			if(error3.responseJSON.errors.city_id){
                opError5+='<div class="alert alert-danger pt-1 pb-1">'+error3.responseJSON.errors.city_id+'</div>';
            }
            $('.alterError1').html(" ");
			$('.alterError2').html(" ");
			$('.alterError3').html(" ");
			$('.alterError4').html(" ");
			$('.alterError5').html(" ");
            $('.alterError1').append(opError3);
			$('.alterError2').append(opError4);
			$('.alterError3').append(opError1);
			$('.alterError4').append(opError5);
			$('.alterError5').append(opError2);
        }
      },
      beforeSend: function() { $('#ring_apply').show(); },
      complete: function() { $('#ring_apply').hide(); }
      });
    });
</script>

