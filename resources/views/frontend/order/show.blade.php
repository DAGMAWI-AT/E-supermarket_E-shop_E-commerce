@extends('frontend.layouts.master')
@section('title','')
@section('main-content')
	<!-- Breadcrumbs -->
	<!-- <div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{('home')}}">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- End Breadcrumbs -->
 {{-- <div class="breadcrumbs">--}}
		
  <div class="container">
<h5 class="card-header">{{ GoogleTranslate::trans('Order ',app()->getLocale()) }}
    <!-- <a href="{{route('order.pdf', $order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a> -->
  </h5>
  <div class="card-body">
    @if ($order)
    <table class="table shopping-summery">
      <thead>
        <tr>
            <th>{{ GoogleTranslate::trans('S.No ',app()->getLocale()) }}</th>
            <th>{{ GoogleTranslate::trans('Order No. ',app()->getLocale()) }}</th>
            <th>{{ GoogleTranslate::trans('Name ',app()->getLocale()) }}</th>
            <th>{{ GoogleTranslate::trans('Email ',app()->getLocale()) }}</th>
            <th>{{ GoogleTranslate::trans('Quantity ',app()->getLocale()) }}</th>
            <th>{{ GoogleTranslate::trans('Charge ',app()->getLocale()) }}</th>
            <th>{{ GoogleTranslate::trans('Total Amount ',app()->getLocale()) }}</th>
            <th>{{ GoogleTranslate::trans('Status ',app()->getLocale()) }}</th>
            <!-- <th>Action</th> -->
        </tr>
      </thead>
      <tbody>
        <tr>
            @php
                $shipping_charge = DB::table('shippings')->where('id', $order->shipping_id)->pluck('price');
            @endphp
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>@foreach($shipping_charge as $data) {{ GoogleTranslate::trans('Birr ',app()->getLocale()) }} {{number_format($data, 2)}} @endforeach</td>
            <td> {{ GoogleTranslate::trans('Birr ',app()->getLocale()) }} {{number_format($order->total_amount, 2)}}</td>
            <td>
                @if($order->status == 'new')
                  <span class="badge badge-primary">{{$order->status}}</span>
                @elseif($order->status == 'process')
                  <span class="badge badge-warning">{{$order->status}}</span>
                @elseif($order->status == 'delivered')
                  <span class="badge badge-success">{{$order->status}}</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <!-- <td>
                <form method="POST" action="{{route('order.destroy', [$order->id])}}">
                  @csrf
                  @method('delete')
                    <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} data-toggle="tooltip" data-placement="bottom" title="Delete" style="height:30px; width:30px;border-radius:50%"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td> -->
        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">{{ GoogleTranslate::trans('ORDER INFORMATION ',app()->getLocale()) }}</h4>
              <table class="table">
                    <tr class="">
                        <td>{{ GoogleTranslate::trans('Order Number : ',app()->getLocale()) }}</td>
                        <td>{{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Order Date : ',app()->getLocale()) }}</td>
                        <td>{{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Quantity : ',app()->getLocale()) }}</td>
                        <td>{{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Order Status : ',app()->getLocale()) }}</td>
                        <td>{{$order->status}}</td>
                    </tr>
                    <tr>
                      @php
                          $shipping_charge = DB::table('shippings')->where('id', $order->shipping_id)->pluck('price');
                      @endphp
                        <td>{{ GoogleTranslate::trans('Shipping Charge : ',app()->getLocale()) }}</td>
                        <td>Birr{{number_format($shipping_charge[0], 2)}}</td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Total Amount : ',app()->getLocale()) }}</td>
                        <td>Birr{{number_format($order->total_amount, 2)}}</td>
                    </tr>
                    <tr>
                      <td>{{ GoogleTranslate::trans('Payment Method : ',app()->getLocale()) }}</td>
                      <td>@if($order->payment_method == 'cod') Cash on Delivery @else Paypal @endif</td>
                    </tr>
                    <tr>
                      <td>{{ GoogleTranslate::trans('Payment Status :',app()->getLocale()) }}</td>
                      <td>{{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">{{ GoogleTranslate::trans('Full Name : ',app()->getLocale()) }}</h4>
              <table class="table">
                    <tr class="">
                        <td>{{ GoogleTranslate::trans('Full Name : ',app()->getLocale()) }}</td>
                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Email : ',app()->getLocale()) }}</td>
                        <td>{{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Phone No : ',app()->getLocale()) }}</td>
                        <td>{{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Address :',app()->getLocale()) }}</td>
                        <td>
                            {{$order->address1}}
                            @if (isset($order->address2))
                            OR {{$order->address2}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Country : ',app()->getLocale()) }}</td>
                        <td>{{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>{{ GoogleTranslate::trans('Post Code : ',app()->getLocale()) }}</td>
                        <td>{{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>


	<!--/ End Shopping Cart -->

	<!-- Start Shop Services Area  -->
{{--	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over Birr 100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>--}}
	<!-- End Shop Newsletter -->

	<!-- Start Shop Newsletter  -->
	{{--@include('frontend.layouts.newsletter')--}}
	<!-- End Shop Newsletter -->

	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->

@endsection
@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
<!-- 
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush -->
