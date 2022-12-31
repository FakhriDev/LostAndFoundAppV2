<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\product;
use App\Models\user;
use App\Models\Claim;
use App\Models\ClaimProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\Process\Process;

class ClaimController extends Controller
{

    public function delete($id){
        $status = Claim::where('id',$id)->first();
        $status->delete();
      
        return redirect('/dashboard')->with('success', 'Claim Has been Delete.');

     }
    
    public function approve($product_id){
        $status = Claim::where('product_id',$product_id)->first();

        $status->status = 'Approved';
        $status->approved_by = Auth::user()->id;
        $status->approved_at = date('Y-m-d H:i:s');
        $status->save();

        $statusp = ClaimProduct::where('claim_id',$product_id)->first();

        $statusp->status = 'Approved';
        $statusp->save();

      $p = product::where('id',$product_id)->first();
      $p->delete();

        return redirect('/dashboard')->with('success', 'Claim Has been Approved.');


     }

     public function cancelled($product_id){
        $status = Claim::where('product_id',$product_id)->first();
        $status->status = 'Cancelled';
        $status->cancelled_by = Auth::user()->id;
        $status->cancelled_at = date('Y-m-d H:i:s');
        $status->save();
      
        return redirect('/dashboard')->with('success', 'Claim Has been Cancelled.');

     }



    public function doClaim(Request $request){
        $claimparams = [
         'product_id' => $request->product_id,
             'post_by' => $request->user_id,
            'user_id' => Auth::user()->id,
            'answer' => $request->answer,
            'status' => 'Process',
            'claim_date' => date('Y-m-d H:i:s'),
            
        ]; 
        
 
        
        $post = Claim::create($claimparams);
        $cek = ClaimProduct::where('claim_id', '=', $post->product_id)->first();
        if($cek === null){
        $cproductparams = [
         'claim_id' => $post->product_id,
             'post_by' => $post->post_by,
             'question' => $request->question,
            'product_name' => $request->product_name,
            'product_image' => $request->product_image,
            'product_description' => $request->product_description,
            'status' => $post->status,
            
        ]; 
        $postcp = ClaimProduct::create($cproductparams);
       }else{
 
       }
         return redirect('/dashboard')->with('success', 'Request has been Created.');
     }
}