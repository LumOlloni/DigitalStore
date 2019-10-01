<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


use Cart;
use App\DatabaseStorageModel;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 15.5%',
            'type' => 'tax',
            'target' => 'total',
            'value' => '18%',
            'attributes' => array( 
                'description' => 'Value added tax',
                'more_data' => 'more data here'
            )
        ));

        $userId = auth()->user()->id;
       Cart::session($userId)->condition($condition);
       
        $cart = Cart::session($userId)->getContent();
        $cartEmpty = Cart::session($userId)->isEmpty();
        return view('template.cart')->with([
        'cartEmpty' => $cartEmpty , 'cart' =>   $cart ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $userId = auth()->user()->id;
      $cartItem =  Cart::session($userId)->add( array(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' =>
             array(
            'image' => $request->imageProduct, 
            'categoryProduct' => $request->categoryName
                        )
        )));
       

          return redirect()->route('shoppingCart')->with(['success' , '' . $request->name . ' eshte shtuar ne Shport']);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $productQuantity =  $product->quantity;

        if( $productQuantity >= $request->quantity){
        $userId = auth()->user()->id; 

         Cart::session($userId)->update($id, [
             'quantity' => array(
                'relative' => false,
                'value' =>  $request->quantity
             )
            ] 
            );

            session()->flash('success' , 'Sasia eshte ndryshuar');
            return response()->json(['success' => true]);

        }else {
            session()->flash('error' , 'Sasia e produkteve nuk mjafton');
            return response()->json(['error' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $userId = auth()->user()->id; 
        Cart::session($userId)->remove($id);
       return redirect()->back()->with('error' , 'Produkti eshte fshire ');
    }
}
