@extends('frontend.layouts.master')
@section('title','')
@section('main-content')
 <!-- DataTales Example -->


     {{--<div class="row">
       <div class="col-md-12">
        
       </div>
     </div>--}}
     <div class="container">
		<div class="row"> 
     <h6 class="m-0 font-weight-bold text-primary float-left">{{ GoogleTranslate::trans('Order Lists',app()->getLocale()) }}</h6>
     </div>
     </div>
  <div class="container">
		<div class="row">  
    
    <div class="card-body">
      <div class="table-responsive">
        @if (count($orders) > 0)
        <table class="table shopping-summery" id="order-dataTable" width="100%" cellspacing="0">
         
        
        
        <thead>
            <tr class="main-hading">
              <th>{{ GoogleTranslate::trans('S.N. ',app()->getLocale()) }}</th>
              <th>{{ GoogleTranslate::trans('Order No. ',app()->getLocale()) }}</th>
              <th>{{ GoogleTranslate::trans('PName ',app()->getLocale()) }}</th>
              <th>{{ GoogleTranslate::trans('Email ',app()->getLocale()) }}</th>
              <th>{{ GoogleTranslate::trans('Quantity ',app()->getLocale()) }}</th>
              <th>{{ GoogleTranslate::trans('Charge ',app()->getLocale()) }}Charge</th>
              <th>{{ GoogleTranslate::trans('Total Amount ',app()->getLocale()) }}</th>
              <th>{{ GoogleTranslate::trans('Status ',app()->getLocale()) }}</th>
              <th>{{ GoogleTranslate::trans('Action ',app()->getLocale()) }}</th>
            </tr>
          </thead>
         
          <tbody>
            @foreach ($orders as $order)
            @php
                $shipping_charge = DB::table('shippings')->where('id', $order->shipping_id)->pluck('price');
            @endphp
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->order_number}}</td>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>@foreach($shipping_charge as $data) {{ GoogleTranslate::trans('Birr ',app()->getLocale()) }} {{number_format($data, 2)}} @endforeach</td>
                    <td>{{ GoogleTranslate::trans('Birr ',app()->getLocale()) }} {{number_format($order->total_amount, 2)}}</td>
                    <td>
                        @if ($order->status == 'new')
                          <span class="badge badge-primary">{{$order->status}}</span>
                        @elseif ($order->status == 'process')
                          <span class="badge badge-warning">{{$order->status}}</span>
                        @elseif ($order->status == 'delivered')
                          <span class="badge badge-success">{{$order->status}}</span>
                        @else
                          <span class="badge badge-danger">{{$order->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('user.order.show' ,$order->id)}}"  data-toggle="tooltip" style="height:30px; width:30px;border-radius:50%"title="View" data-placement="bottom"><i class=" ti-eye"></i></a> 
                        <a href="{{route('user.order.edit', $order->id)}}" data-toggle="tooltip" style="height:30px; width:30px;border-radius:50%"title="View" data-placement="bottom"><i class="ti-comment"></i></a>
                        {{--<form method="POST" action="{{route('user.order.delete',[$order->id])}}">
                          @csrf
                          @method('delete')
                            <button class="btn btn-danger btn-sm dltBtn" data-id="{{$order->id}}" data-toggle="tooltip" data-placement="bottom" title="Delete" style="height:30px; width:30px;border-radius:50%"><i class="fas ti-trash-alt"></i></button>
                        </form>--}}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$orders->links()}}</span>
        @else
          <h6 class="text-center">{{ GoogleTranslate::trans('No orders found!!! Please order some products ',app()->getLocale()) }}</h6>
        @endif
      </div>
    </div>
</div>
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
						<p>Orders over $100</p>
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
	@include('frontend.layouts.newsletter')
	<!-- End Shop Newsletter -->

	<!-- Modal -->
        
        <!-- Modal end -->

@endsection




@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#order-dataTable').DataTable({
        "columnDefs":[
          {
            "orderable": false,
            "targets": [8]
          }
        ]
      });

      // Sweet alert

      function deleteData(id){

      }
  </script>
  <script>
      $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('.dltBtn').click(function(e) {
          var form = $(this).closest('form');
          var dataID = $(this).data('id');
          // alert(dataID);
          e.preventDefault();
          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
              form.submit();
            } else {
              swal("Your data is safe!");
            }
          });
        })
      })
  </script>
@endpush
