<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\Claim;
use App\Models\user;
use App\Models\ClaimProduct;
use App\Models\Category;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller

{
    

    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function index(Request $request) {
        $types = type::withCount('tproduct')->get();
        $categories = Category::withCount('product')->get();
        if($request){
        $products = product::where('product_name','like','%'.$request->keyword.'%')->paginate(12);
        }else{
        $products = product::InRandomOrder()->paginate(12);
        }
        return view('/index', compact('categories','products','types'));
    }
    public function showItemCategory(Category $category){
        $categories = Category::withCount('product')->get();
         $products = $category->product('id')->paginate(12);
         $types = type::withCount('tproduct')->get();
        return view('/index', compact('categories','products','types'));    
    }

    public function details($id) {
        $cek = Auth::id();
        $products = product::find($id);
        return view('details',compact('products','cek'));
    }
    
}
