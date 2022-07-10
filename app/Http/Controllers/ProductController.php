<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Static_;

class ProductController extends Controller
{
    public function index()
    {
        
        $products=Product::all();
        $categories=Categorie::all();
        //dd(Product::find(1)->statistics()->first());
        return view('products',['products'=>$products,'categories'=>$categories]);
    }

    public function add(Request $req)
    {
       
$product=new Product();
$product->name=$req->name;
$product->price=$req->price;
$product->description=$req->description;
$product->categorie_id=$req->categorie_id;
$product->save();
return redirect()->back();
    }

    public function allproducts()
    {
        $products=Product::all();
        return view('allproducts',['products'=>$products]);
    }
    public function showproduct($id,Request $req)
    {
      
        $stat=new Statistic();
        $stat->details=$req->header('User-Agent');
        $stat->ip=$req->ip();
        $stat->product_id=$id;
        $stat->user_id=Auth::user()->id;
        $stat->save();

        //dd($req->ip());
        $product=Product::find($id);
        return view('product',['product'=>$product]);
    }
    
}
