@extends('frontend.layouts.master')

@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">{{ GoogleTranslate::trans('Home',app()->getLocale()) }}<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">{{ GoogleTranslate::trans('Contact',app()->getLocale()) }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
						@php
										$settings = DB::table('settings')->get();
									@endphp
							<div class="form-main">
								<div class="title">
									@php
										$settings = DB::table('settings')->get();
									@endphp
									<h4> {{ GoogleTranslate::trans('Get in touch',app()->getLocale()) }}</h4>
									<h3>{{ GoogleTranslate::trans('Write us a message',app()->getLocale()) }} @auth @else<span style="font-size:12px;" class="text-danger">{{ GoogleTranslate::trans('[You need to login first]',app()->getLocale()) }}</span>@endauth</h3>
								</div>
								<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ GoogleTranslate::trans('Your Name',app()->getLocale()) }}<span>*</span></label>
												<input name="name" id="name" type="text" placeholder="{{ GoogleTranslate::trans('Enter your name',app()->getLocale()) }}">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ GoogleTranslate::trans('Your Subjects',app()->getLocale()) }}<span>*</span></label>
												<input name="subject" type="text" id="subject" placeholder="{{ GoogleTranslate::trans('Enter Subject',app()->getLocale()) }}">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ GoogleTranslate::trans('Your Email',app()->getLocale()) }}<span>*</span></label>
												<input name="email" type="email" id="email" placeholder=" {{ GoogleTranslate::trans('Enter email address',app()->getLocale()) }}">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ GoogleTranslate::trans('Your Phone',app()->getLocale()) }}<span>*</span></label>
												<input id="phone" name="phone" type="tel" placeholder=" {{ GoogleTranslate::trans('Enter your phone',app()->getLocale()) }}">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>{{ GoogleTranslate::trans('Your message',app()->getLocale()) }}<span>*</span></label>
												<textarea name="message" id="message" cols="30" rows="9" placeholder="{{ GoogleTranslate::trans('Enter Message ',app()->getLocale()) }}"></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">{{ GoogleTranslate::trans('Send Message',app()->getLocale()) }}</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:{{ GoogleTranslate::trans('Cancel',app()->getLocale()) }}</h4>
									<ul>
										<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">{{ GoogleTranslate::trans('Email:',app()->getLocale()) }}</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">@foreach($settings as $data) {{$data->email}} @endforeach</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">{{ GoogleTranslate::trans('Our Address:',app()->getLocale()) }}</h4>
									<ul>
										<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->

	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap">
			<iframe src="https://www.google.de/maps/place/H9WW%2BCMP,+Bahir+Dar,+%C3%84thiopien/@11.5969221,37.3931667,17z/data=!4m20!1m13!4m12!1m4!2m2!1d37.397366!2d11.598259!4e1!1m6!1m2!1s0x1644ce10848f5f77:0x7177173c2587a55a!2sH9WW%2BCMP,+Bahir+Dar,+%C3%84thiopien!2m2!1d37.3967441!2d11.5967127!3m5!1s0x1644ce10848f5f77:0x7177173c2587a55a!8m2!3d11.5967127!4d37.3967441!16s%2Fg%2F11bw3gyljl?entry=ttu" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
	</div>
	<!--/ End Map Section -->

	<!-- Start Shop Newsletter  -->
	@include('frontend.layouts.newsletter')
	<!-- End Shop Newsletter -->
	<!--================Contact Success  =================-->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">{{ GoogleTranslate::trans('Thank you!',app()->getLocale()) }}</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">{{ GoogleTranslate::trans('Your message is successfully sent...',app()->getLocale()) }}</p>
			</div>
		  </div>
		</div>
	</div>

	<!-- Modals error -->
	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">{{ GoogleTranslate::trans('Sorry!',app()->getLocale()) }}</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">{{ GoogleTranslate::trans('Something went wrong.',app()->getLocale()) }}</p>
			</div>
		  </div>
		</div>
	</div>
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
