@extends('employee.layouts.master')

@section('title','comment Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Order       
  </h5>
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
             <a href="{{route('Ecomment.edit', $comment->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
             <form method="POST" action="{{route('Ecomment.destroy', [$comment->id])}}">
               @csrf
               @method('delete')
                 <button class="btn btn-danger btn-sm dltBtn" data-id={{$comment->id}} data-toggle="tooltip" data-placement="bottom" title="Delete"  style="height:30px; width:30px;border-radius:50%"><i class="fas fa-trash-alt"></i></button>
             </form>
         </td>
        </tr>
      </tbody>
    </table>

    -->
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