<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Chapa\Chapa\Facades\Chapa as Chapa;
use NunoMaduro\Collision\Provider;
use App\Models\Cart;
use App\Models\Product;
use DB;
class ChapaController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initialize(Request $request)
    {
        $cart = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get()->toArray();
        // $name=Product::where('id',$item['product_id'])->pluck('title')->first();
        $data['items'] = array_map(function ($item) use($cart) {
            $name=Product::where('id',$item['product_id'])->pluck('title')->first();
            return [
                'name' =>$name ,
                'price' => $item['price'],
                'desc'  => 'Thank you for using paypal',
                'qty' => $item['quantity']
            ];
        }, $cart);

        $data['invoice_id'] ='ORD-'.strtoupper(uniqid());
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;
        if(session('coupon')){
            $data['shipping_discount'] = session('coupon')['value'];
        }
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => session()->get('id')]);

        //This generates a payment reference
        $reference = $this->reference;
        

        // Enter the details of the payment
        $data = [
            
            'amount' => $data['total'],
            'email' => 'amaredagmawi1@gmail.com',
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'return_url' => route('payment.success'),
            'first_name' => "dagmawi",
            'last_name' => "Amare",
            "customization" => [
                "title" => 'Chapa Test',
                "description" => "I testtsts this"
            ]
        ];
        

        $payment = Chapa::initializePayment($data);

       //dd($data);
        // if ($payment['status'] !== 'success') {
        //     // notify something went wrong
        //     return ;
        //     // reference()->session()->flash('success','You successfully pay from Paypal! Thank You');
        //     // session()->forget('cart');
        //     // session()->forget('coupon');
        //     // return redirect()->route('home');
        // }

        return redirect($payment['data']['checkout_url']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback($reference)
    {
        
        $data = Chapa::verifyTransaction($reference);
       // dd($data);

        //if payment is successful
        if ($data['status'] ==  'success') {
            // if (in_array(strtoupper($data['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            reference()->session()->flash('success','You successfully pay from Chapa! Thank You');
            session()->forget('cart');
            session()->forget('coupon');
            return redirect()->route('home');
        //dd($data);
        }

        else{
            //oopsie something ain't right.
            reference()->session()->flash('error','Something went wrong please try again!!!');
        return redirect()->back();
        }


        
    }



    public function success(Request $request)
    {
       
    

    
        // Payment failed or something went wrong
        request()->session()->flash('success','You successfully pay from Chapa! Thank You');
        // request()->session()->flash('error', 'Something went wrong. Please try again!');
        return redirect()->route('home');
    }
    
    
}