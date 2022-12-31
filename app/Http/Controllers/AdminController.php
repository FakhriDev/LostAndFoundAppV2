<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\product;
use App\Models\user;
use App\Models\type;
use App\Models\Claim;
use App\Models\ClaimProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function updateuser(Request $request){
        $id = Auth::user()->id;
        $cek = $request->password;
        $cek1 = $request->photo;
    if($cek === null && $cek1 === null){
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact
        ]);
        return redirect('/profile');
    }
    elseif($cek === null && $cek1 !== null){
        if($request->hasFile('photo')){
            $fileNamaWithExt = $request->file('photo')->getClientOriginalName();
            $filename =pathinfo($fileNamaWithExt, PATHINFO_FILENAME);
            $ext = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('photo')->storeAs('/photos', $fileNameToStore);
            }else{
            }
    DB::table('users')->where('id',$id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'contact' => $request->contact,
        'photo' => $fileNameToStore,
    ]);
    return redirect('/profile');
    }
    else{
            if($request->hasFile('photo')){
                $fileNamaWithExt = $request->file('photo')->getClientOriginalName();
                $filename =pathinfo($fileNamaWithExt, PATHINFO_FILENAME);
                $ext = $request->file('photo')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$ext;
                $path = $request->file('photo')->storeAs('/photos', $fileNameToStore);
                }else{
                }
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'photo' => $fileNameToStore,
            'password' => $request->password
        ]);
        return redirect('/profile');
        }
    }

    public function profile(){
        return view('profile');
    }

    public function myrequest(){
        $claims = Auth::user()->claim()->paginate(12);
        return view('myrequest',compact('claims'));
        
    }

    public function myads(){
        $products = Auth::user()->post_by()->paginate(12);
        return view('myads',compact('products'));
    }

    public function dashboard(){
        $claims = Auth::user()->inti()->paginate(12);
        return view('dashboard',compact('claims'));
    }

        public function post(){
            $types = type::get();
            $categories = Category::get();
            return view('post', compact('categories','types'));
        }
        public function saveproduct(Request $request){
            $cek = $request->type;
            if($cek === 1){
            $validation = $request->validate([
                'product_name' => 'required||min:3',
                'product_description' => 'required|min:3|max:200',
                'product_image' => 'required|image|mimes:jpeg,png,jpg,image|nullable|max:1999'
                ]);
            }else{
                $validation = $request->validate([
                    'product_name' => 'required||min:3',
                    'product_description' => 'required|min:3|max:200',
                    'question' => 'required',
                    'product_image' => 'required|image|mimes:jpeg,png,jpg,image|nullable|max:1999'
                ]);
             }
            if($request->hasFile('product_image')){
            $fileNamaWithExt = $request->file('product_image')->getClientOriginalName();
            $filename =pathinfo($fileNamaWithExt, PATHINFO_FILENAME);
            $ext = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('product_image')->storeAs('/product_images', $fileNameToStore);
            }else{
            }
            $product = new product();
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_image = $fileNameToStore;
            $product->category_id = $request->category;
            $product->question = $request->question;
            $product->type = $request->type;
            $product->user_id = Auth::user()->id;
    
            $product->save();
            return redirect('/index')->with('success', 'Post Uploaded Successfuly.');
        }

        public function editads($id){
            $products = product::find($id);
            $categories = Category::withCount('product')->get();
            $types = type::withCount('tproduct')->get();
            return view('/editads',compact('categories','types','products'));
        }

        public function deleteproduct($id){
            $product = product::find($id);
    
            $product->delete();
            return redirect('/myads')->with('success', ' Ads has been Deleted.');
        }

        public function saveEditPost(Request $request){
            $cek = $request->product_image;
        if($cek === null){
            DB::table('products')->where('id',$request->id)->update([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'type' => $request->type,
                'question' => $request->question,
                'category_id' => $request->category,
            ]);
            return redirect('/myads');
        }else{
            if($request->hasFile('product_image')){
                $fileNamaWithExt = $request->file('product_image')->getClientOriginalName();
                $filename =pathinfo($fileNamaWithExt, PATHINFO_FILENAME);
                $ext = $request->file('product_image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$ext;
                $path = $request->file('product_image')->storeAs('/product_images', $fileNameToStore);
                }else{
                }
        DB::table('products')->where('id',$request->id)->update([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'type' => $request->type,
                'question' => $request->question,
                'category_id' => $request->category,
                'product_image' => $fileNameToStore,
        ]);
        return redirect('/myads');
        }
    }
}