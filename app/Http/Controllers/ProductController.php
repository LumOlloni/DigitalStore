<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use File;
use App\Category;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('adminTemplate.product')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('adminTemplate.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|min:4',
            'price' => 'required|integer',
            'manufacturer' => 'required',
            'category' => 'required|integer',
            'quantity' => 'required|integer',
            'descriptionProduct' => 'required|min:10',
            'img' => ['required','mimes:jpeg,jpg,png,gif','max:10000'],
        ]);

        $product = new Product;
        $product->name = $request->input('name'); 
        $product->price = $request->input('price'); 
        $product->manufacturer = $request->input('manufacturer'); 
        $product->quantity =  $request->input('quantity'); 
        $product->category_id = $request->category;
        $product->description = $request->input('descriptionProduct'); 
        if($request->hasFile('img')){
            $image = $request->file('img');
       

            $extension = Input::file('img')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            $destinationPath = public_path('storage/img/PoduktetImage/'. $fileName);
       
            Image::make($image)->resize(500,500)->save( $destinationPath);
      
            $product->image =  $fileName;
        }
        $product->save();
        return redirect()->back()->with('successCreate' , 'Product Created Succefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::find($id);
       $currentCategory = $product->category->name;
       $categories = Category::where('name' , '!=' ,$currentCategory )->get();

       return view('adminTemplate.edit')->with('product',$product)->withCategories($categories);
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
        $this->validate($request , [
            'name' => 'required|min:4',
            'price' => 'required|integer',
            'manufacturer' => 'required',
            'quantity' => 'required|integer',
            'category' => 'required|integer',
            'descriptionProduct' => 'required|min:10',
            'img' => ['mimes:jpeg,jpg,png,gif,jfif','max:10000'],
        ]);

       
        $product = Product::find($id);
        $product->name = $request->input('name'); 
        $product->price = $request->input('price'); 
        $product->manufacturer = $request->input('manufacturer'); 
        $product->quantity =  $request->input('quantity'); 
        $product->category_id = $request->category;
        $product->description = $request->input('descriptionProduct'); 

      
            if($request->hasFile('img')){
                $image = $request->file('img');
           

                $extension = Input::file('img')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;

                $destinationPath = public_path('storage/img/PoduktetImage/'. $fileName);
           
                Image::make($image)->resize(500,500)->save( $destinationPath);

                $oldImage =  $product->image;
                $image_path = 'storage/img/PoduktetImage/'. $oldImage;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $product->image =  $fileName;
        
                }
           
        
        $product->save();
        return redirect()->back()->with('successUpdate' , 'Product Update Succefully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $oldImage =  $product->image;
        $image_path = 'storage/img/PoduktetImage/'. $oldImage;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

        $product->delete();

        session()->flash('errorDelete' , 'Product Removed');
        return response()->json(['success' => true]);

     
    }
}
