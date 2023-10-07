@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">{{ GoogleTranslate::trans('Home',app()->getLocale()) }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ GoogleTranslate::trans('About Us',app()->getLocale()) }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <h3>{{ GoogleTranslate::trans('Welcome To',app()->getLocale()) }} <span>{{ GoogleTranslate::trans('Eshop',app()->getLocale()) }}</span></h3>
                        <p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
                        <div class="button">
                            <!-- <a href="{{route('blog')}}" class="btn">Our Blog</a> -->
                            <a href="{{route('contact')}}" class="btn primary">{{ GoogleTranslate::trans('Contact Us',app()->getLocale()) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                         <div class="button">
                            -->
                        </div>
                        <img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
                    </div>
                </div>
            </div>
        </div>
	</section>
	<!-- End About Us -->

	<!-- Start Shop Services Area -->
<section class="shop-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>{{ GoogleTranslate::trans('Free shiping',app()->getLocale()) }}</h4>
                    <p>{{ GoogleTranslate::trans('Orders over Birr 100',app()->getLocale()) }}</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>{{ GoogleTranslate::trans('Free Return',app()->getLocale()) }}</h4>
                    <p>{{ GoogleTranslate::trans('Within 30 days returns',app()->getLocale()) }}</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>{{ GoogleTranslate::trans('Sucure Payment',app()->getLocale()) }}</h4>
                    <p>{{ GoogleTranslate::trans('100% secure payment',app()->getLocale()) }}</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>{{ GoogleTranslate::trans('Best Peice',app()->getLocale()) }}</h4>
                    <p>{{ GoogleTranslate::trans('Guaranteed price',app()->getLocale()) }}</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
    </section>
	<!-- End Shop Services Area -->

	@include('frontend.layouts.newsletter')

    <!-- Start Team -->
    <section id="team" class="team section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ GoogleTranslate::trans('Our Expert Team',app()->getLocale()) }}</h2>
                        <p>{{ GoogleTranslate::trans('software engineering.',app()->getLocale()) }} </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Team -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-team">
                        <!-- Image -->
                        <div class="image">
                            <img src="/storage/photos/1/20200204_190153.jpg" alt="#">
                        </div>
                        <!-- End Image -->
                        <div class="info-head">
                            <!-- Info Box -->
                            <div class="info-box">
                                <h4 class="name"><a href="#">{{ GoogleTranslate::trans('Dagmawi Amare',app()->getLocale()) }}</a></h4>
                                <span class="designation">{{ GoogleTranslate::trans('Software Developer',app()->getLocale()) }} </span>
                            </div>
                            <!-- End Info Box -->
                            <!-- Social -->
                            <div class="social-links">
                                <ul class="social">
                                    <li><a href="www.facebook.com"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Social -->
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-team">
                        <!-- Image -->
                        <div class="image">
                            <img src="/storage/photos/1/Team/team2.jpg" alt="#">
                        </div>
                        <!-- End Image -->
                        <div class="info-head">
                            <!-- Info Box -->
                            <div class="info-box">
                                <h4 class="name"><a href="#">{{ GoogleTranslate::trans('Abrehame',app()->getLocale()) }} </a></h4>
                                <span class="designation">{{ GoogleTranslate::trans('Requirment Analysis',app()->getLocale()) }}</span>
                            </div>
                            <!-- End Info Box -->
                            <!-- Social -->
                            <div class="social-links">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Social -->
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
               {{-- <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-team">
                        <!-- Image -->
                        <div class="image">
                            <img src="/storage/photos/1/Team/team3.jpg" alt="#">
                        </div>
                        <!-- End Image -->
                        <div class="info-head">
                            <!-- Info Box -->
                            <div class="info-box">
                                <h4 class="name"><a href="#"></a></h4>
                                <span class="designation">{{ GoogleTranslate::trans('Web Developer',app()->getLocale()) }}</span>
                            </div>
                            <!-- End Info Box -->
                            <!-- Social -->
                            <div class="social-links">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Social -->
                        </div>
                    </div>
                </div>--}}
                <!-- End Single Team -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-team">
                        <!-- Image -->
                        <div class="image">
                            <img src="/storage/photos/1/Team/team4.jpg" alt="#">
                        </div>
                        <!-- End Image -->
                        <div class="info-head">
                            <!-- Info Box -->
                            <div class="info-box">
                                <h4 class="name"><a href="#">{{ GoogleTranslate::trans('Dejen Aschalew',app()->getLocale()) }}</a></h4>
                                <span class="designation">{{ GoogleTranslate::trans('UI Designer',app()->getLocale()) }}</span>
                            </div>
                            <!-- End Info Box -->
                            <!-- Social -->
                            <div class="social-links">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Social -->
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
        </div>
    </section>
    <!--/ End Team Area -->
@endsection
