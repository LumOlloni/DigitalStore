<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Input;
use DB;
use Response;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        $product =  Product::all();
        return view('home')->withCategory($category)->withProduct($product);
    }

    public function show($id)
    {
        $product =  Product::find($id);
        $category = Category::all();
        $productRandom = Product::orderBy(DB::raw('RAND()'))->take(4)->get();
        return view('template.showProduct')->withProduct($product)->withProductRandom($productRandom);
    }

    public function categorySearch(Request $request)
    {
        $data = $request->cat;
        $category = Category::all();

        $product =  DB::table('product')->join('category', 'category.id', '=', 'product.category_id')->where('category.name', '=', $data)
            ->select('product.name', 'product.image', 'product.price', 'product.id')
            ->get();

        return view('home')->withProduct($product)->withCategory($category);
    }

    public function searchProduct(Request $request)
    {

        $product = new Product;
        $category = Category::all();
        $search = Input::get('search');
        if ($search != '') {
            $productSearch = Product::where('name', 'LIKE', '%' . $search . '%')->get();
            return view('home')->withProduct($productSearch)->withCategory($category);
        } else if ($search == '') {
            return redirect()->back();
        }
    }
}
