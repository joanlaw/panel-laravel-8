<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Statistic;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserControlle extends Controller
{
    public function index()
    {
        if(Auth::user()->type!="admin")
        {
            //dd(1);
            return redirect()->route('allproducts');
        }
        $userData = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $users=User::all();
        $products=Product::all();
        $statistics=Statistic::all();
        $last = DB::table('statistics')
                ->latest()
                ->first();
                //dd($last);
        return view('dashboard', compact('userData'),['users'=>$users,'products'=>$products,'statistics'=>$statistics,'last'=>$last]);
    }
    public function users()
    {
        $users=User::all();
        return view('users',['users'=>$users]);
    }
    public function adduser(Request $req)
    {       
$user=new User();
$user->name=$req->name;
$user->email=$req->email;
$user->password=Hash::make($req->password);
$user->save();
return redirect()->back();
    }
}
