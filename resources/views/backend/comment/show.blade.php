@extends('backend.layouts.master')

@section('title','comment Detail')

@section('main-content')
<div class="card">

  <div class="card-body">
    @if($comment)
    <table class="table table-striped table-hover">
      <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Post Title</th>
        <th>Message</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
          
      </thead>
      <tbody>
       <tr>
       @php
              $title = DB::table('posts')->select('title', 'slug')->where('id', $comment->post_id)->get();
              @endphp
         <td>{{$comment->id}}</td>
         <td>{{$comment->user_info['name']}}</td>
         <td>@foreach($title as $data) <a href=""> {{ $data->title}} @endforeach</td>
         <td>{{$comment->comment}}</td>
         <td>{{$comment->created_at->format('M d D, Y g: i a')}}</td>
         <td>
             @if ($comment->status == 'active')
               <span class="badge badge-success">{{$comment->status}}</span>
             @else
               <span class="badge badge-warning">{{$comment->status}}</span>
             @endif
         </td>
         <td>
             <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
             <form method="POST" action="{{route('comment.destroy', [$comment->id])}}">
               @csrf
               @method('delete')
                 <button class="btn btn-danger btn-sm dltBtn" data-id={{$comment->id}} data-toggle="tooltip" data-placement="bottom" title="Delete"  style="height:30px; width:30px;border-radius:50%"><i class="fas fa-trash-alt"></i></button>
             </form>
         </td>
        </tr>
      </tbody>
    </table>

    <!-- <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">ORDER INFORMATION</h4>
              <table class="table">
                    <tr class="">
                        <td>Order Number</td>
                        
                    </tr>
                    <tr>
                        <td>Order Date</td>
                       
                    </tr>
                    <tr>
                        <td>Quantity</td>
                       
                    </tr>
                    <tr>
                        <td>Order Status</td>
                        
                    </tr>
                    <tr>
                        <td>Shipping Charge</td>
                       
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                   
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td> : </td>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td> : </td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
              <table class="table">
                    <tr class="">
                        <td>Full Name</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> :</td>
                    </tr>
                    <tr>
                        <td>Phone No.</td>
                        <td> : </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> :</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td> :</td>
                    </tr>
                    <tr>
                        <td>Post Code</td>
                        <td> : </td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif -->

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