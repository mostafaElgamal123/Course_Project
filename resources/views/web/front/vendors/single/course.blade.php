<!-- Start header  -->
<div class="landing">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="text-center">
					<h1 class="title_course rounded-pill p-3 fw-bolder text-white">
						{{$course->title}}
					</h1>
					<div>
					<?php echo $course->description; ?>
					</div>
					<p>
						<a href="#formview"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
						@if(isset($changeconstant->enrollnow)) {{$changeconstant->enrollnow}} @endif
						</a>
					</p>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end header  -->

<!-- Start section1 -->
@if($course->titles->isNotEmpty())
<section dir="ltr" class="bg-2">	
	<div class="pt-5 pb-5 container">
		<div class="row g-4 align-self-stretch">
			<div class="col-12">
				<h3 class="text-center p-2 title_style under_line">@if(isset($changeconstant->title_section_content)) {{$changeconstant->title_section_content}} @endif</h3>
			</div>
			@foreach($course->titles as $title)
			<div class="col-md-4 col-sm-6 col-12 mb-3 d-flex">
				<div class="card_box">
					<h3><strong>{{$title->title}}</strong></h3>
					<div class="title_ask">
					  <?php echo $title->description; ?>
					</div>
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
			<a href="#formview"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
			@if(isset($changeconstant->enrollnow)) {{$changeconstant->enrollnow}} @endif
			</a>
		</div>
	</div>
</section>
@endif
<!-- End section1 -->
@if($course->coursefeatures !=null)
        <!--course features-->
		<section dir="ltr" class="bg-1">	
			<div class="pt-5 pb-5 container">
				<div class="row g-2 align-self-stretch">
					<div class="col-12">
						<h3 class="text-center p-2 title_style under_line">@if(isset($changeconstant->title_coursefeature)) {{$changeconstant->title_coursefeature}} @endif</h3>
					</div>
					<div class="col-12 d-flex flex-column justify-content-center">
						<?php echo $course->coursefeatures; ?>
					</div>
				</div>
			</div>
		</section>
		<!--end course features-->
@endif
<!-- section famous programmers -->
@if($famousprogrammer->isNotEmpty())
			<section class="previous_work bg-2">
				<div class="container-fluid">
					<div class="row mx-0 justify-content-center pt-5">
						<div class="col-lg-6">
							<div class="section-title text-center position-relative mb-4">
								<h3 class="position-relative text-uppercase pb-2 title_style under_line">@if(isset($changeconstant->title_famousprogrammer))   {{$changeconstant->title_famousprogrammer}} @endif</h3>
							</div>
						</div>
					</div>
					<div class="owl-carousel famousprogrammer-carousel">
						@foreach($famousprogrammer as $famousprogram)
						<div class="courses-item position-relative">
							<img class="img-fluid" src="<?php if($famousprogram->image !='unnamed.jpg'): ?>{{asset('storage/'.$famousprogram->image)}} <?php else: ?> {{asset('assets/imgs/'.$famousprogram->image)}} <?php endif; ?>" alt="">
						</div>
						@endforeach
					</div>
				</div>
			</section>
@endif
			<!-- end section famous programmers -->
		<!-- Start section2 -->
		<section class="bg-1 review">
			<div class="container">
				<div class="row sec-vedio">
					<div class="col-lg-6 col-md-12 order-sm-2 order-1">
						<h2 class="text-primary p-2 text-center title-color">@if(isset($changeconstant->title_video1)) {{$changeconstant->title_video1}} @endif</h2>
					</div>
					<div class="col-lg-6 col-md-12 order-md-1 order-1">
						<?php echo $course->review_video; ?>
					</div>
				</div>

				<div class="pt-5 pb-5">
					<div class="row flex-column">
					    <div class="col-md-12">
							<h2 class="text-center pt-3 pb-3 text-primary fw-bold title-color">
							@if(isset($changeconstant->title_video2))  {{$changeconstant->title_video2}} @endif
							</h2>
						</div>
						<div class="col-sm-10 col-12 mx-auto">
							<?php  echo $course->explanation_video; ?>
						</div>
					</div>
				</div>
			</div>
		</section>		
		<!-- End section2 -->


		<!-- start accordion  -->
		@if($course->faqs->isNotEmpty())
		<section class="bg-2 faq">
			<div class="container">
				<div class="text-center pb-2">
					<a href="#formview"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
					@if(isset($changeconstant->enrollnow))  {{$changeconstant->enrollnow}} @endif
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
		@endif
		<!-- end accordion  -->

	   
		<!-- End section3 -->

		<!-- Start section4 -->
		@if($course->reviews->isNotEmpty())
			<section class="bg-1 review">
					<div class="sec4 text-center pb-5 pt-5 ">
						<h2 class="fw-bolder text-primary under_line title-color">
						@if(isset($changeconstant->title_section_review))   {{$changeconstant->title_section_review}} @endif
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
						<div class="row pb-2">
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
						<div class="text-center pb-2">
								<a href="#formview"  class="btn ms-auto main-btn mt-3 mb-3" type="submit">
								@if(isset($changeconstant->enrollnow))	{{$changeconstant->enrollnow}} @endif
						</a>
						</div>
						<div class="row pb-5 pt-5">
							@foreach($course->reviews as $review)
								@if($review->review_image!=null)
								<div class="col-lg-4 col-md-6 col-12">
								<img src="<?php if($review->review_image !='r1_1652729127.webp'): ?>{{asset('storage/'.$review->review_image)}} <?php else: ?>{{asset('assets/imgs/'.$review->review_image)}} <?php endif; ?>">
								</div>
								@endif
							@endforeach
						</div>
					</div>
			</section>
		@endif
			<!-- end section6 -->
			<!-- section previous work -->
			@if($course->cards->isNotEmpty())
				<section class="previous_work">
					<div class="container-fluid">
						<div class="row mx-0 justify-content-center pt-5">
							<div class="col-lg-6">
								<div class="section-title text-center position-relative mb-4">
									<h3 class="position-relative text-uppercase pb-2 title_style under_line">@if(isset($changeconstant->title_card))   {{$changeconstant->title_card}} @endif</h3>
								</div>
							</div>
						</div>
						<div class="owl-carousel courses-carousel">
							@foreach($course->cards as $card)
							<div class="courses-item position-relative">
								<img class="img-fluid" src="<?php if($card->image !='courses-4.jpg'): ?>{{asset('storage/'.$card->image)}} <?php else: ?>{{asset('assets/imgs/'.$card->image)}} <?php endif; ?>" alt="">
								<div class="courses-text">
									<h4 class="text-center text-white px-3">{{$card->description}}</h4>
									<div class="border-top w-100 mt-3">
										<div class="d-flex justify-content-between p-4">
											<span class="text-white"><i class="fa fa-user me-2"></i>{{$card->name}} </span>
											<span class="text-white"><i class="fa fa-star me-1"></i>{{$card->rating}} </span>
										</div>
									</div>
									<div class="w-100 bg-2 text-center p-4" >
										<a class="btn btn-primary" href="{{$card->url}}" target="_blank">View Project</a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</section>
			@endif
			<!-- end section previous work -->
	         <!-- Start section7 -->
			 <section class="bg-1 faq" id="formview">
				<div class="container">
					<!-- Display the countdown timer in an element -->
						<h1 class="rounded-pill p-3 fw-bolder text-primary title-color text-center">
						@if(isset($changeconstant->title_form_offer)) {{$changeconstant->title_form_offer}} @endif <span class="color-price">{{$course->price}}</span> جنيه بدلا من <span class="color-price"> {{$course->price + $course->offer }}</span>
						</h1>
						<!-- end section7 -->
						<!-- start footer -->
						<section id="form" class="border border-primary mb-2 p-4">
							<p class="fw-bolder text-center title_form_style">  @if(isset($changeconstant->title_form)) {{$changeconstant->title_form}} @endif </p>
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
												<input type="text" id="name" class="form-control save border-dark" id="exampleInputEmail1" aria-describedby="emailHelp">
												<div class="alterError1"></div>
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label">الرقم <span style="color:red; font-size:25px;">*</span></label>
												<input type="text" id="phone" class="form-control save border-dark" id="exampleInputPassword1">
												<div class="alterError2"></div>
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label">رقم اخر</label>
												<input type="text" id="phone2" class="form-control save border-dark" id="exampleInputPassword1">
												<div class="alterError6"></div>
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label">البريد الالكتروني <span style="color:red; font-size:25px;">*</span></label>
												<input type="email" id="email" class="form-control save border-dark" id="exampleInputPassword1">
												<div class="alterError3"></div>
											</div>
											<div class="mb-3">
												<label class="form-label">المحافظه <span style="color:red; font-size:25px;">*</span></label>
												<select id="city_id" name="city_id" value="{{old('city_id')}}" class="save form-select border-dark ">
													<option value="0" disabled="true" selected="true">-Select-</option>
													@foreach($city as $cit)
													<option value="{{$cit->id}}">{{$cit->city}}</option>
													@endforeach
												</select>
												<div class="alterError4"></div>
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label"> المؤهل الدراسي <span style="color:red; font-size:25px;">*</span></label>
												<input type="text" id="educational_qualification" class="form-control save border-dark" id="exampleInputPassword1">
												<div class="alterError5"></div>
											</div>
											<input type="hidden" id="course_id" value="{{$course->id}}" class="form-control save border-dark" id="exampleInputPassword1">
											<button type="submit" class="btn w-100 btn-primary btn_form">@if(isset($changeconstant->submit_form)) {{$changeconstant->submit_form}} @endif</button>
										</form>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12 d-flex">
										<div class="form_image">
											<img src="<?php if($course->image !='back-2_1627326624.webp'): ?>{{asset('storage/'.$course->image)}} <?php else: ?>{{asset('assets/imgs/'.$course->image)}} <?php endif; ?>" alt="">
										</div>
									</div>
								</div>

						</section>
						<!-- end footer -->
				</div>
			 </section>

			 <!-- Back to Top -->
			 <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
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
	let phone2 = $('#phone2').val();
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
		phone2:phone2,
        email:email,
		city_id:city_id,
        educational_qualification:educational_qualification,
        course_id:course_id,
      },
      success:function(response){
        if(response){
          $("#OrderForm")[0].reset(); 
          //console.log(data);
        //opSuccess+='<div class="alert alert-success">'+response.success+'</div>';
		$('.alterError1').html(" ");
		$('.alterError2').html(" ");
		$('.alterError3').html(" ");
		$('.alterError4').html(" ");
		$('.alterError5').html(" ");
        $('.alterSuccess').html(" ");
        $('.alterSuccess').append(opSuccess);
        }
		window.location.href = `{{route('success')}}`;
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
      beforeSend: function() { 
		$('#ring_apply').show();
		$(".save").attr("disabled", true);
	 },
      complete: function() { 
		$('#ring_apply').hide();
		$(".save").attr("disabled", false);
	 }
      });
    });
</script>

