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

    <div class="table-header">
      <h5>Order Details</h5>
    </div>
    <table class="table table-bordered table-stripe">
      <thead>
        <tr>
             
              <th>Order No.</th>
              <th>InvoiceNO</th>
              <th>Name</th>
              <th>Email</th>
              <th>Quantity</th>
              <th>Charge</th>
              <th>Total Amount</th>
        </tr>
      </thead>
      @foreach ($order as $orders)
      
      @php
                $shipping_charge = DB::table('shippings')->where('id', $orders->shipping_id)->pluck('price');
            @endphp
            @foreach ($orders->cart_info as $cart)
                          @php
                            $product = DB::table('products')->select('title')->where('id', $cart->product_id)->get();
                          @endphp
      <tbody>
  
      <tr>
                    <td>{{$orders->id}}</td>
                    <td>{{$orders->order_number}}</td>
                    <td>{{$orders->first_name}} {{$orders->last_name}}</td>
                    <td>{{$orders->email}}</td>
                    <td>{{$orders->quantity}}</td>
                    <td>@foreach($shipping_charge as $data) Birr {{number_format($data, 2)}} @endforeach</td>
                    <td>Birr {{number_format($orders->total_amount, 2)}}</td>  
</tr>
    
      </tbody>
      @endforeach
      @endforeach
    </table>
  
 

