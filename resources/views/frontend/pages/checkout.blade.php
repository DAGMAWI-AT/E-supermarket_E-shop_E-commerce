@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')
<!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" /> -->
<!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .content {
                margin-top: 100px;
                text-align: center;
            }
        </style> -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}"> {{ GoogleTranslate::trans('Home',app()->getLocale()) }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">  {{ GoogleTranslate::trans('Checkout',app()->getLocale()) }} </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="POST" action="{{route('cart.order')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2> {{ GoogleTranslate::trans('Make Your Checkout Here ',app()->getLocale()) }}</h2>
                            <p>{{ GoogleTranslate::trans('Please register in order to checkout more quickly ',app()->getLocale()) }}</p>
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label> {{ GoogleTranslate::trans('First Name',app()->getLocale()) }}<span>*</span></label>
                                        <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                        @error('first_name')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>{{ GoogleTranslate::trans('Last Name ',app()->getLocale()) }}<span>*</span></label>
                                        <input type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                        @error('last_name')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>{{ GoogleTranslate::trans('Email Address ',app()->getLocale()) }}<span>*</span></label>
                                        <input type="email" name="email" placeholder="" value="{{old('email')}}">
                                        @error('email')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label> {{ GoogleTranslate::trans('Phone Number ',app()->getLocale()) }}<span>*</span></label>
                                        <input type="tel" name="phone" placeholder="" required value="{{old('phone')}}">
                                        @error('phone')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label> {{ GoogleTranslate::trans('Country',app()->getLocale()) }}<span>*</span></label>
                                        <select name="country" id="country">
                                            
                                            
                                            <option value="ET"> {{ GoogleTranslate::trans('Ethiopia',app()->getLocale()) }}</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label> {{ GoogleTranslate::trans('Address Line 1',app()->getLocale()) }}<span>*</span></label>
                                        <input type="text" name="address1" placeholder="" value="{{old('address1')}}">
                                        @error('address1')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label> {{ GoogleTranslate::trans('Address Line 2',app()->getLocale()) }}</label>
                                        <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                        @error('address2')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>{{ GoogleTranslate::trans('Postal Code ',app()->getLocale()) }}</label>
                                        <input type="text" name="post_code" placeholder="" value="{{old('post_code')}}">
                                        @error('post_code')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2> {{ GoogleTranslate::trans('CART  TOTALS',app()->getLocale()) }}</h2>
                                <div class="content">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">{{ GoogleTranslate::trans('Cart Subtotal ',app()->getLocale()) }}<span>Birr{{number_format(Helper::totalCartPrice(),2)}}</span></li>
                                        <li class="shipping">
                                            Shipping Cost
                                            @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                <select name="shipping" class="nice-select" required>
                                                    <option value=""required>{{ GoogleTranslate::trans(' Select your address ',app()->getLocale()) }}</option>
                                                    @foreach(Helper::shipping() as $shipping)
                                                    <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}" required>{{$shipping->type}}: Birr {{$shipping->price}}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <span>Free</span>
                                            @endif
                                        </li>

                                        @if(session('coupon'))
                                        <li class="coupon_price" data-price="{{session('coupon')['value']}}"> {{ GoogleTranslate::trans('You Save',app()->getLocale()) }}<span>Birr {{number_format(session('coupon')['value'],2)}}</span></li>
                                        @endif
                                        @php
                                            $total_amount=Helper::totalCartPrice();
                                            if(session('coupon')){
                                                $total_amount=$total_amount-session('coupon')['value'];
                                            }
                                        @endphp
                                        @if(session('coupon'))
                                            <li class="last"  id="order_total_price">{{ GoogleTranslate::trans('Total',app()->getLocale()) }}<span>Birr {{number_format($total_amount,2)}}</span></li>
                                        @else
                                            <li class="last"  id="order_total_price">{{ GoogleTranslate::trans('Total',app()->getLocale()) }}<span>Birr {{number_format($total_amount,2)}}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2> {{ GoogleTranslate::trans('Payments',app()->getLocale()) }}</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments{{ GoogleTranslate::trans('Total',app()->getLocale()) }}</label> --}}
                                        <form-group>
                                            <input name="payment_method"  type="radio" value="cod" required> <label> Cash On Delivery</label><br>
                                            <!-- <a href="{{ route('payment') }}" name="payment_method"class="btn btn-success">Pay $100 from Paypal</a> -->
                                            <input  name="payment_method" type="radio" value="paypal" required> <label> PayPal</label><br>
                                            <input  name="payment_method" type="radio" value="chapa" target="_blank" required><label> pay chapa borsa</label>
                                            <!-- <h3>Buy Borsa for 100.00 ETB</h3>
                                                <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                                                 @csrf


                                                <input type="submit" value=" pay chapa borsa" />
                                                </form> -->
                                        </form-group>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn"> {{ GoogleTranslate::trans('proceed to checkout',app()->getLocale()) }}</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
            <!-- <h3>Buy Borsa for 100.00 ETB</h3>
                                                <form method="POST" action="{{ route('pay') }}" name="payment_method" id="paymentForm">
                                                 @csrf


                                                <input type="submit" value=" pay chapa borsa" />
                                                </form> -->
            <!-- <div class="content"> -->

<!-- <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table> -->

   <!-- <a href="{{ route('payment') }}" class="btn btn-success">Paypal</a> -->

   <!-- </div> -->
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>{{ GoogleTranslate::trans('Free shiping ',app()->getLocale()) }}</h4>
                        <p>{{ GoogleTranslate::trans('Orders over Birr 100 ',app()->getLocale()) }}</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>{{ GoogleTranslate::trans('Free Return ',app()->getLocale()) }}</h4>
                        <p>{{ GoogleTranslate::trans('Within 30 days returns ',app()->getLocale()) }}</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>{{ GoogleTranslate::trans('Sucure Payment ',app()->getLocale()) }}</h4>
                        <p>{{ GoogleTranslate::trans('100% secure payment ',app()->getLocale()) }}</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>{{ GoogleTranslate::trans('Best Peice ',app()->getLocale()) }}</h4>
                        <p>{{ GoogleTranslate::trans('Guaranteed price ',app()->getLocale()) }}</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4> {{ GoogleTranslate::trans('Newsletter',app()->getLocale()) }}</h4>
                            <p> {{ GoogleTranslate::trans(' Subscribe to our newsletter and get',app()->getLocale()) }} <span>10% </span> {{ GoogleTranslate::trans(' off your first purchase',app()->getLocale()) }}</p>
                            <form action="mail/mail.php" method="get" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn"> {{ GoogleTranslate::trans('Subscribe',app()->getLocale()) }}</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') );
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
				// alert(coupon);
				$('#order_total_price span').text('Birr'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush
