<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Payment;
use Response;
use Session;
use Notification;
use App\Notifications\NewProductCreate;



class CheckOutController extends Controller
{



    public function index(){
        $userId = auth()->user()->id;
        $cart =  Cart::session($userId)->isEmpty();
        if($cart){
            return redirect()->back()->with('error', "Ju nuk keni asgje ne shport");
        }
        else {
            $cartContent = Cart::session($userId)->getContent();
            return view('template.payment')->with('cartContent' , $cartContent);
        }
    }

    public function getCartData($string){
        $userId = auth()->user()->id;
        $contents = Cart::session($userId)->getContent();
        if ($string == 'name') {
            $data = $contents->map(function($func){
                return $func->name;   
            })->values()->toJson();
            return $data;
        }
        else if($string == 'price'){

            $data = $contents->map(function($price){
                return $price->price;
            })->values()->toJson();
            return $data;
        }
        else if($string == 'quantity'){
            $data = $contents->map(function($quantity){
                return $quantity->quantity;
            })->values()->toJson();
            return $data;
        }
        else if($string == 'totalCart'){
            $data = $contents->map(function($cart){
                return [ 
                        'id' => $cart->id,
                        'name' => $cart->name, 
                        'quantity' => $cart->quantity,
                        'price' => $cart->price,
                        'image' => $cart->attributes->image
                    ];
            })->values()->toJson();
            return $data;
        }
       
    }

    public function store(Request $request){
        try {
            $payment = new Payment;
            $product = new Product;
            $userId = auth()->user()->id;

            $this->validate( $request, [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'adresa' => 'required',
                'qyteti' => 'required',
                'telefoni' => 'numeric|min:9'

            ]);

                $this->changeQuantity($product);

             $charge = \Stripe::charges()->create([
                 'amount' => Cart::session($userId)->getTotal()  ,
                 'currency' => 'EUR',
                 'description' => 'Order',
                 'source' => $request->stripeToken ,
                 'receipt_email' => $request->email,
                 'metadata' => [
                    'pershkrimi' =>  $this->getCartData('name'),
                    'qmimi' =>   $this->getCartData('price'),
                    'sasia' =>  $this->getCartData('quantity')
                    
                 ]
             ]);

          
             $this->addOrderData($payment);
           

          
            
            Cart::session($userId)->clear();
          
             return redirect()->route('thankYouPage')->with(['successPayment' => 'Falemiderit per blerjen e Produkteve. Pagesa juaj ishte e sukseshme ']);
        }
        catch(Exeption $e){

            return redirect()->route('paymentPage')->with('errorPayment' , 'Transaksioni juaj ka deshtuar ');
        }
     }

     public function addOrderData(Payment $p){
        $userId = auth()->user()->id;
        $p->user_id = $userId;
        $p->order = $this->getCartData('totalCart');
        $p->totalPayment = Cart::session($userId)->getTotal();
        $p->save();

        // Notification::route('mail' , 'lumolloni12@gmail.com')->notify(new NewProductCreate());
     }

     public function changeQuantity( Product $product){
        $userId = auth()->user()->id;
        $cart =  Cart::session($userId)->getContent();

        foreach ($cart as $item) {
            $product = Product::where('id' ,$item->id)->get();

            foreach ($product as $p ) {

                $quantityOfProduct = $p->quantity;
                $oldBayQuantity = $p->buyProduct;
                $newQuantity = $quantityOfProduct - $item->quantity;
                $p->quantity =  $newQuantity;
                $p->buyProduct = $oldBayQuantity + ($item->quantity);
                $p->save();
                
            }


        }
       

     }


    public function thankYou(){
        
        if(!session()->has('successPayment')){
            return redirect('/home');
        }
       

        return  view('template.thankYou');
    }

    public function downloadPDF(){
        
        \PDF::setOptions(['dpi' => 10, 'defaultFont' => 'sans-serif']);
        $userId = auth()->user()->id;
        $query = Payment::where('user_id' , $userId)->orderBy('created_at' , 'DESC')->take(1)->get();
        foreach ($query as $q ) {
            $json =  $q->order;
            $id = $q->id;
        }
        $paymentUser = Payment::find($id);
        $dateTime = date('m/d/Y h:i:s a', time());
        $data = json_decode($json ,true);
        $Pdf = \PDF::loadView('viewComponents.paymentPdf' , ['query' =>  $query , 
        'data' => $data , 'dateTime' =>  $dateTime , 'paymentUser' => $paymentUser ]);
        return $Pdf->download('pagesa.pdf');
    }

}
