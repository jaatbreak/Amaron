<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Category;
use App\Traits\Common_trait;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
class WalletController extends Controller
{
    
    use Common_trait;
    public function wallet(Request $request){
        
        
        if ($request->ajax()) {
            $users = Wallet::orderBy("id", "asc");
            return DataTables::of($users)
            ->editColumn('user_id', function ($wallet){
                // print_r($wallet->user_id);exit;
                  if($wallet->user_id){ 
                    $user = User::select('email')->where('id', $wallet->user_id)->get();
                    // print_r($user);exit;
                    return $user[0]->email; }else{ return '--'; };
            })
            // ->editColumn('thumbnail', function ($contact){
            //       if($contact->thumbnail){ return 'uploads/'.$contact->thumbnail; }else{ return 'admin/1.png'; };
            // })
            // ->editColumn('banner_image', function ($contact){
            //       if($contact->banner_image){ return 'uploads/'.$contact->banner_image; }else{ return 'admin/1.png'; };
            // })
            ->toJson();
         }

        return view('admin.pages.wallet');
    }

    public function add_wallet(Request $req){
        if($req->method()=='POST'){
            
            $validated = $req->validate(  
                [
                    'user' => 'required',
                    'amount' => 'required',
                    'reference' => 'required',
                    'trans_type' => 'required',
                ],
            );
            
            $category = new Category;
            $data = [
                'user_id'=>$req->user,
                'reference'=>$req->reference,
                ($req->trans_type == '+')?'credit':'debit'=>$req->amount,
                'trans_type'=>'+',//$req->trans_type,
            ];

            $data1 = Wallet::create($data);
            // var_dump($data);exit;
            $req->session()->flash('add_wallet', 'Add Wallet Successful!');
            return redirect()->route('admin/wallet');    
        }
        $wallet_data['users'] =  User::select('email','id')->get(); ;
        // echo "<pre>";
        // print_r($wallet_data['users']);exit;
        return view('admin.pages.add_wallet',$wallet_data);
    }
  
    public function delete_wallet(Request $req){
        $data = Wallet::where('id', $req->id)->delete();
        $req->session()->flash('delete_wallet', 'Delete Successful!');
        return redirect()->route('admin/wallet');
    }


    public function edit_wallet(Request $req, $id){
        $dataa = Wallet::findOrFail($id);
        // $dataa->trans_type
        
        if($req->method()=='POST'){
            
            $data = [
                'user_id'=>$req->user,
                'reference'=>$req->reference,
                'credit'=>($req->trans_type == '+')?$req->amount:0,
                'debit'=>($req->trans_type == '-')?$req->amount:0,
                'trans_type'=>$req->trans_type,
            ];
            // print_r($data);exit;
            Wallet::where('id',$req->id)->update($data);
            $req->session()->flash('edit_wallet', 'Edit Successful!');
            return redirect()->route('admin/wallet');
        }
        $wallet_data['users'] =  User::select('email','id')->get(); 
        // echo "<pre>";print_r($dataa);exit;
        return view('admin.pages.edit_wallet', ['edit_wallet' => $dataa], $wallet_data);
    }
    
    // ,Rule::unique('category')->ignore($id)

}
