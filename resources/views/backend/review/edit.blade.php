@extends('backend.layouts.master')

@section('title','Review Edit')

@section('main-content')
<div class="card">
  <h5 class="card-header">Review Edit</h5>
  <div class="card-body">
    <form action="{{route('review.update', $review->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Review By</label>
        <input type="text" disabled class="form-control" value="{{$review->user_info->name}}">
      </div>
      <div class="form-group">
        <label for="review">Rate</label>
        <div style="list-style:none">
          @for ($i = 1; $i <= 5; $i++)
              @if ($review->rate >= $i)
                  <li style="float:left;color:#F7941D;"><i class="fa fa-star"></i></li>
              @else
                  <li style="float:left;color:#F7941D;"><i class="far fa-star"></i></li>
              @endif
          @endfor
        </div>
      </div>
      <br>
      <div class="form-group">
        <label for="review">Review</label>
        <textarea name="review" id="" cols="20" rows="10" class="form-control">{{$review->review}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">Status <span class="text-danger">*</span></label>
        <select name="status" id="" class="form-control">
          <option value="">--Select Status--</option>
          <option value="active" {{(($review->status == 'active') ? 'selected' : '')}}>Active</option>
          <option value="inactive" {{(($review->status == 'inactive') ? 'selected' : '')}}>Inactive</option>
        </select>
        @error('status')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
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
