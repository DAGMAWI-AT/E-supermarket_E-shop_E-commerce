@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{('home')}}">{{ GoogleTranslate::trans('Newslatter',app()->getLocale()) }}<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="">{{ GoogleTranslate::trans('Cart',app()->getLocale()) }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>{{ GoogleTranslate::trans('PRODUCTS',app()->getLocale()) }}</th>
								<th>{{ GoogleTranslate::trans('NAMES',app()->getLocale()) }}</th>
								<th class="text-center">{{ GoogleTranslate::trans('UNIT PRICE',app()->getLocale()) }}</th>
								<th class="text-center">{{ GoogleTranslate::trans('QUANTITYS',app()->getLocale()) }}</th>
								<th class="text-center">{{ GoogleTranslate::trans('TOTAL',app()->getLocale()) }}</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
										<tr>
											@php
											$photo=explode(',',$cart->product['photo']);
											@endphp
											<td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
											<td class="product-des" data-title="Description">
												<p class="product-name"><a href="{{route('product-detail',$cart->product['slug'])}}" >{{$cart->product['title']}}</a></p>
												<p class="product-des">{!!($cart['summary']) !!}</p>
											</td>
											<td class="price" data-title="Price"><span> {{ GoogleTranslate::trans('Birr',app()->getLocale()) }} {{number_format($cart['price'],2)}}</span></td>
											<td class="qty" data-title="Qty"><!-- Input Order -->
												<div class="input-group">
													<div class="button minus">
														<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$key}}]">
															<i class="ti-minus"></i>
														</button>
													</div>
													<input type="text" name="quant[{{$key}}]" class="input-number"  data-min="1" data-max="100" value="{{$cart->quantity}}">
													<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
													<div class="button plus">
														<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$key}}]">
															<i class="ti-plus"></i>
														</button>
													</div>
												</div>
												<!--/ End Input Order -->
											</td>
											<td class="total-amount cart_single_price" data-title="Total"><span class="money">{{ GoogleTranslate::trans('Birr',app()->getLocale()) }} {{$cart['amount']}}</span></td>

											<td class="action" data-title="Remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="ti-trash remove-icon"></i></a></td>
										</tr>
									@endforeach
									<track>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="float-right">
											<button class="btn float-right" type="submit">{{ GoogleTranslate::trans('UPDATE',app()->getLocale()) }}</button>
										</td>
									</track>
								@else
										<tr>
											<td class="text-center">
											{{ GoogleTranslate::trans('There are no any carts available',app()->getLocale()) }} <a href="{{route('product-grids')}}" style="color:blue;">{{ GoogleTranslate::trans('Continue shopping',app()->getLocale()) }}</a>

											</td>
										</tr>
								@endif

							</form>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
									    <form action="{{route('coupon-store')}}" method="POST">
											@csrf
											<input name="code" placeholder=" {{ GoogleTranslate::trans('Enter Your Coupon',app()->getLocale()) }}">
											<button class="btn">{{ GoogleTranslate::trans('Apply',app()->getLocale()) }}</button>
										</form>
									</div>
									 <div class="checkbox">
										@php
											$shipping=DB::table('shippings')->where('status','active')->limit(1)->get();
										@endphp
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox" onchange="showMe('shipping');">{{ GoogleTranslate::trans('Shipping',app()->getLocale()) }} </label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">{{ GoogleTranslate::trans('Cart Subtotal',app()->getLocale()) }}<span>{{ GoogleTranslate::trans('Birr',app()->getLocale()) }} {{number_format(Helper::totalCartPrice(),2)}}</span></li>
										 <div id="shipping" style="display:none;">
											<li class="shipping">
												Shipping {{session('shipping_price')}}
												@if(count(Helper::shipping())>0 && Helper::cartCount()>0)
													<div class="form-select">
														<select name="shipping" class="nice-select">
															<option value="">{{ GoogleTranslate::trans('Select',app()->getLocale()) }}</option>
															@foreach(Helper::shipping() as $shipping)
															<option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}:  {{ GoogleTranslate::trans('Birr',app()->getLocale()) }} {{$shipping->price}}</option>
															@endforeach
														</select>
													</div>
												@else
													<div class="form-select">
														<span> {{ GoogleTranslate::trans('Free',app()->getLocale()) }}</span>
													</div>
												@endif
											</li>
										</div>
{{--										  {{dd(Session::get('coupon')['value'])}}--}}
										@if(session()->has('coupon'))
										    <li class="coupon_price" data-price="{{Session::get('coupon')['value']}}">{{ GoogleTranslate::trans('You Save',app()->getLocale()) }}<span> {{ GoogleTranslate::trans('Birr',app()->getLocale()) }} {{number_format(Session::get('coupon')['value'],2)}}</span></li>
										@endif
										@php
											$total_amount=Helper::totalCartPrice();
											if(session()->has('coupon')){
												$total_amount=$total_amount-Session::get('coupon')['value'];
											}
										@endphp
										@if(session()->has('coupon'))
											<li class="last" id="order_total_price">{{ GoogleTranslate::trans('You Pay',app()->getLocale()) }}<span>{{ GoogleTranslate::trans('Birr',app()->getLocale()) }} {{number_format($total_amount,2)}}</span></li>
										@else
											<li class="last" id="order_total_price">{{ GoogleTranslate::trans('You Pay',app()->getLocale()) }}<span>{{ GoogleTranslate::trans('Birr',app()->getLocale()) }} {{number_format($total_amount,2)}}</span></li>
										@endif
									</ul>
									<div class="button5">
										<a href="{{route('checkout')}}" class="btn">{{ GoogleTranslate::trans('Checkout',app()->getLocale()) }}</a>
										<a href="{{route('product-grids')}}" class="btn">{{ GoogleTranslate::trans('Continue shopping',app()->getLocale()) }}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

	<!-- Start Shop Services Area  -->
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
						<p>{{ GoogleTranslate::trans('Within 7 days returns',app()->getLocale()) }}</p>
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
	<!-- End Shop Newsletter -->

	<!-- Start Shop Newsletter  -->
	@include('frontend.layouts.newsletter')
	<!-- End Shop Newsletter -->

	<!-- Modal -->
       
        <!-- Modal end -->

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
        function showMe(box) {
            var checkbox = document.getElementById('shipping').style.display;
            // alert(checkbox);
            var vis = 'none';

            if (checkbox=="none") {
                vis = 'block';
            }

            if (checkbox=="block") {
                vis = "none";
            }

            document.getElementById(box).style.display = vis;
        }
    </script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') );
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
				// alert(coupon);
				$('#order_total_price span').text('{{ GoogleTranslate::trans('Birr',app()->getLocale()) }}'+(subtotal + cost-coupon).toFixed(2));
			});

		});
	</script>
@endpush
