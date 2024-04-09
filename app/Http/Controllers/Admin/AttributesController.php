<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attributes;
use App\Models\AttributesValue;
use App\Traits\Common_trait;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class AttributesController extends Controller
{
    use Common_trait;
    public function attributes(Request $req){

        if ($req->method()=='POST') {
                $validated = $req->validate(  
                    [
                        'name' => 'required|unique:attributes',
                    ],
                );
                $data = [
                    'name'=>$req->name,
                    'slug'=> $this->create_unique_slug($req->name,'attributes'),
                ];
                $data = attributes::create($data);
                $req->session()->flash('add_attributes', 'Add Attributes Successful!');
                return redirect()->route('admin/product/attributes');
        }

       
        $data = attributes::orderBy("id", "asc")->get();
       // $dataa = AttributesValue::where( 'attributes_id' , $id )->get();
        return view('admin.pages.attributes', ['attributes' => $data]);

    }
    
    public function attributes_value_edit(Request $request, $id){
        $attributes_value = AttributesValue::find($id);
        if($request->method() == "POST"){
            $attributes_value->name = $request->name;
            $attributes_value->color_code = $request->color_code;
            $attributes_value->desc = $request->desc;
            
            $attributes_value->save();
             $request->session()->flash('add_attributes_value', 'Attributes Value Updated Successful!');
            return back();  
            
        }
        return view('admin.pages.edit_attributes_value', compact('attributes_value'));
    }

    public function attributes_value(Request $req, $id){

        if ($req->method()=='POST') {
            $validated = $req->validate(  
                [
                    'name' => 'required|unique:attributes_value',
                ],
            );
            
            $data = [
                'name'=>$req->name,
                'attributes_id'=>$req->attributes_id,
                'desc'=>$req->desc,
                'color_code'=>$req->color_code,
                'slug'=> $this->create_unique_slug($req->name,'attributes_value'),
            ];
            $data = AttributesValue::create($data);
            $req->session()->flash('add_attributes_value', 'Add Attributes Value Successful!');
            return back();  
        }

        // $attributes_id =  AttributesValue::where('attributes_id')->all();

         $valusdata = AttributesValue::where( 'attributes_id' , $id )->get();
        $dataa = Attributes::findOrFail($id);
        
        return view('admin.pages.attributes_value',  ['attributes_value' => $dataa],  ['value' => $valusdata] );
    }
    public function deleteattribute(Request $req , $id){
        $delete = Attributes::find($id);
        $delete->delete();
         $req->session()->flash('add_attributes', 'Delete Successful!');
        return back();  
    }


    public function attributes_value_delete(Request $request , $id){
        $delete = AttributesValue::find($id);
        $delete->delete();
         $request->session()->flash('add_attributes_value', 'Delete Successful!');
        return back();  
    }
}
