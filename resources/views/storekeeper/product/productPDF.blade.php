<style type="text/css">
  .invoice-header {
    background: #f7f7f7;
    padding: 10px 20px 10px 20px;
    border-bottom: 1px solid gray;
  }
  .site-logo {
    margin-top: 20px;
  }
  .invoice-right-top h3 {
    padding-right: 20px;
    margin-top: 20px;
    color: green;
    font-size: 30px!important;
    font-family: serif;
  }
  .invoice-left-top {
    border-left: 4px solid green;
    padding-left: 20px;
    padding-top: 20px;
  }
  .invoice-left-top p {
    margin: 0;
    line-height: 20px;
    font-size: 16px;
    margin-bottom: 3px;
  }
  thead {
    background: green;
    color: #FFF;
  }
  .authority h5 {
    margin-top: -10px;
    color: green;
  }
  .thanks h4 {
    color: green;
    font-size: 25px;
    font-weight: normal;
    font-family: serif;
    margin-top: 20px;
  }
  .site-address p {
    line-height: 6px;
    font-weight: 300;
  }
  .table tfoot .empty {
    border: none;
  }
  .table-bordered {
    border: none;
  }
  .table-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
  }
  .table td, .table th {
    padding: .30rem;
  }
  </style>

  
    
        <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Category</th>
              <th>ExpirDate</th>
              <th>purchasing</th>
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

            @foreach ($product as $product)
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
                            <span class="badge badge-success">safe{{$product->expirdate}} </span>
                      @endif
                    </td>
                    <td>{{$product->purchasing}}Birr</td>
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