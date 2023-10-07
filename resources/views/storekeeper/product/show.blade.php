@extends('manager.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">Order
    <a href="{{route('Morder.pdf', $order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
  </h5>
  <div class="card-body">
    @if ($order)
    <table class="table table-striped table-hover">
      @php
        $shipping_charge = DB::table('shippings')->where('id', $order->shipping_id)->pluck('price');
      @endphp
      <thead>
      <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Category</th>
              <th>Is Featured/Edate</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Size</th>
              <th>Condition</th>
              <th>Brand</th>
              <th>Stock</th>
              <th>Photo</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
              @php
              $sub_cat_info = DB::table('categories')->select('title', 'slug')->where('id', $product->child_cat_id)->get();
              // dd($sub_cat_info);
              $brands = DB::table('brands')->select('title')->where('id', $product->brand_id)->get();
              @endphp
                <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="">{{$product->title}}</a></td>
                    <td>{{$product->cat_info['title']}}
                      <sub>
                        @foreach ($sub_cat_info as $data)
                              <a href="">{{$data->title}}</a>
                        @endforeach
                      </sub>
                    </td>
                    <td>
                    @if($product->created_at->diffInDays(\Carbon\Carbon::now()) > $product->expirdate)
                          <span class="badge badge-warning">Expired</span>
                      @else
                        {{$product->created_at->diffInDays(\Carbon\Carbon::now()) < $product->expirdate}} 
                            <span class="badge badge-success">Safe {{$product->expirdate}} </span>
                      @endif
                    </td>
                    <td>{{$product->price}}Birr</td>
                    <td>{{$product->discount}}% OFF</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->condition}}</td>
                    <td>@foreach($brands as $brand) {{$brand->title}} @endforeach</td>
                    <td>
                      @if($product->stock > 0)
                      <span class="badge badge-primary">{{$product->stock}}</span>
                      @else
                      <span class="badge badge-danger">{{$product->stock}}</span>
                      @endif
                    </td>
                    <td>
                        @if ($product->photo)
                            @php
                              $photo = explode(',', $product->photo);
                              // dd($photo);
                            @endphp
                            <img src="{{$photo[0]}}" class="img-fluid zoom" style="max-width:80px" alt="{{$product->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    
                   
                    
                </tr>
      </tbody>
      
    </table>


    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">ORDER INFORMATION</h4>
              <table class="table">
                    <tr class="">
                        <td>product id :</td>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <td>Product Date :</td>
                        <td>{{$product->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                    <td>Ordered Product:</td>
                    @foreach ($product->cart_info as $cart)
                          @php
                            $product = DB::table('products')->select('title')->where('id', $cart->product_id)->get();
                          @endphp
                          @endforeach
                        <td>  @foreach ($product as $pro){{$pro->title}}
                               @endforeach</td>
                    
                    </tr>
                    <tr>
                        <td>Quantity :</td>
                        <td>{{$product->quantity}}</td>
                    </tr>
                    <tr>
                        <td> Status :</td>
                        <td>{{$product->status}}</td>
                    </tr>

                   
                   
                    <tr>
                        <td>purchasing :</td>
                        <td> <td>{{$product->purchasing}}Birr</td></td>
                    </tr>
                    <tr>
                        <td>Price :</td>
                        <td>{{$product->price}}Birr</td>
                    </tr>
                    <td>
                      @if($product->stock > 0)
                      <span class="badge badge-primary">{{$product->stock}}</span>
                      @else
                      <span class="badge badge-danger">{{$product->stock}}</span>
                      @endif
                    </td>
                    <td>
                    @if($product->created_at->diffInDays(\Carbon\Carbon::now()) > $product->expirdate)
                          <span class="badge badge-warning">Expired</span>
                      @else
                        {{$product->created_at->diffInDays(\Carbon\Carbon::now()) < $product->expirdate}} 
                            <span class="badge badge-success">Safe {{$product->expirdate}} </span>
                      @endif
                    </td>
                    <tr>
                        <td> Status :</td>
                        <td> {{$product->status}}</td>
                    </tr>



                    <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="">{{$product->title}}</a></td>
                    <td>{{$product->cat_info['title']}}
                      <sub>
                        @foreach ($sub_cat_info as $data)
                              <a href="">{{$data->title}}</a>
                        @endforeach
                      </sub>
                    </td>
                    <td>
                    @if($product->created_at->diffInDays(\Carbon\Carbon::now()) > $product->expirdate)
                          <span class="badge badge-warning">Expired</span>
                      @else
                        {{$product->created_at->diffInDays(\Carbon\Carbon::now()) < $product->expirdate}} 
                            <span class="badge badge-success">Safe {{$product->expirdate}} </span>
                      @endif
                    </td>
                    <td>{{$product->price}}Birr</td>
                    <td>{{$product->discount}}% OFF</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->condition}}</td>
                    <td>@foreach($brands as $brand) {{$brand->title}} @endforeach</td>
                    <td>
                      @if($product->stock > 0)
                      <span class="badge badge-primary">{{$product->stock}}</span>
                      @else
                      <span class="badge badge-danger">{{$product->stock}}</span>
                      @endif
                    </td>
                    <td>
                        @if ($product->photo)
                            @php
                              $photo = explode(',', $product->photo);
                              // dd($photo);
                            @endphp
                            <img src="{{$photo[0]}}" class="img-fluid zoom" style="max-width:80px" alt="{{$product->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    
                   
                    
                </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
              <table class="table">
                <tr class="">
                    <td>Full Name :</td>
                    <td> {{$order->first_name}} {{$order->last_name}}</td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td> {{$order->email}}</td>
                </tr>
                <tr>
                    <td>Phone :</td>
                    <td> {{$order->phone}}</td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td>
                        {{$order->address1}}
                        @if (isset($order->address2))
                            OR {{ $order->address2}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Country :</td>
                    <td> {{$order->country}}</td>
                </tr>
                <tr>
                    <td>Post Code :</td>
                    <td> {{$order->post_code}}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="order_details pt-3">
    <div class="shipping-info">
              <h4 class="text-center pb-4">Order Details</h4>

    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="col-6">Product</th>
          <th scope="col" class="col-3">Quantity</th>
          <th scope="col" class="col-3">Total</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($order->cart_info as $cart)
      @php
        $product = DB::table('products')->select('title')->where('id', $cart->product_id)->get();
      @endphp
        <tr>
          <td>
            <span>
              @foreach ($product as $pro)
                {{$pro->title}}
              @endforeach
            </span>
          </td>
          <td>x {{$cart->quantity}}</td>
          <td><span>Birr {{number_format($cart->price, 2)}}</span></td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Subtotal:</th>
          <th scope="col"> <span>Birr {{number_format($order->sub_total, 2)}}</span></th>
        </tr>
      {{-- @if(!empty($order->coupon))
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Discount:</th>
          <th scope="col"><span>-{{$order->coupon->discount(Helper::orderPrice($order->id, $order->user->id))}}{{Helper::base_currency()}}</span></th>
        </tr>
      @endif --}}
        <tr>
          <th scope="col" class="empty"></th>
          @php
            $shipping_charge = DB::table('shippings')->where('id', $order->shipping_id)->pluck('price');
          @endphp
          <th scope="col" class="text-right ">Shipping:</th>
          <th><span>Birr{{number_format($shipping_charge[0], 2)}}</span></th>
        </tr>
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Total:</th>
          <th>
            <span>
                Birr {{number_format($order->total_amount, 2)}}
            </span>
          </th>
        </tr>
      </tfoot>
    </table>
    </div>
  </section>
 
    @endif

  </div>
</div>
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
