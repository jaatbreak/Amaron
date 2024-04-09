<?php

namespace App\Http\Controllers;
use App\Models\UserClient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{

    public function user(Request $request){
        

        if ($request->ajax()) {
            $users = UserClient::select('*')->orderBy('id','ASC');
            return DataTables::of($users)
            ->editColumn('created_at', function ($contact){
                return date('d/m/y H:i', strtotime($contact->created_at));
            })
            ->make(true);
         }

        return view('admin.pages.user');
    }


    public function adduser(Request $req){
        if($req->method()=='POST'){
            $validated = $req->validate(
                [
                    'name' => 'required||unique:user',
                    'email' => 'required',
                    'phone' => 'required',
                    'password' => 'required',
                    'avatar' => 'image|mimes:jpg,jpeg,png'
                ],
            );
            if ($req->hasFile('avatar')) {
                $file = $req->avatar;
                $file_name = time().$file->getClientOriginalName();
                $newname = $file_name;
                $file->move('uploads', $newname);
            }
            $userdata = [
                    'name'=>$req->name,
                    'phone'=>$req->phone,
                    'email'=>$req->email,
                    'address'=>$req->address,
                    'city'=>$req->city,
                    'country'=>$req->country,
                    'state'=>$req->state,
                    'pin_code'=>$req->pin_code,
                    'avatar'=>$newname ?? "" ,
                    'password'=>Hash::make($req->password),
                    'bio'=>$req->bio,
                ];
                $data = UserClient::create($userdata);
                return response()->json(['status'=> 'success'] );

        }


    }




}