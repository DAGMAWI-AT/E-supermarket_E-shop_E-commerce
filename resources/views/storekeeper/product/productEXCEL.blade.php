<table class="table table-bordered table-stripe">
    <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Category</th>
              <th>Is Featured</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Size</th>
              <th>Condition</th>
              <th>Brand</th>
              <th>Stock</th>
              <th>Status</th>
              
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
        <td><a href="{{route('product-detail', $product->slug)}}">{{$product->title}}</a></td>
        <td>{{$product->cat_info['title']}}
          <sub>
            @foreach ($sub_cat_info as $data)
                  <a href="{{route('product-sub-cat',[$product->cat_info['slug'],$data->slug])}}">{{$data->title}}</a>
            @endforeach
          </sub>
        </td>
        <td>{{(($product->is_featured == 1) ? 'Yes': 'No')}}</td>
        <td>{{$product->price}}$</td>
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

        <td>
            @if ($product->status == 'active')
                <span class="badge badge-success">{{$product->status}}</span>
            @else
                <span class="badge badge-warning">{{$product->status}}</span>
            @endif
        </td>
        
      
    </tr>
@endforeach
</tbody>

    </table>
  
 

