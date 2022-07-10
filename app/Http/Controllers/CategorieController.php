<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function index()
    {
        
        $categories=Categorie::all();
        return view('categories',['categories'=>$categories]);
    }
    public function add(Request $req)
    {
$categorie=new Categorie();
$categorie->name=$req->name;
$categorie->user_id=Auth::user()->id;
$categorie->save();
return redirect()->back();
    }
}
