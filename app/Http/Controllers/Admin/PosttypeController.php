<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posttype;
use App\Models\Postcontent;
use App\Traits\Common_trait;
use Illuminate\Support\Str;

class PosttypeController extends Controller
{
    use Common_trait;

    public function posttype(Request $req){
        $data = Posttype::orderBy("id", "asc")->get();
        return view('admin.pages.posttype', ['data' => $data]);
    }

    public function posttype_status_update(Request $req, $status, $id,){
        $posttype = Posttype::find($id);
        $posttype->status = $status;
        $posttype->save();
        $req->session()->flash('status', 'Status Updated Successfully.');
        return back();
    }
    
    public function add_posttype(Request $req){
        if($req->method()=='POST'){
            $validated = $req->validate(  
                [
                    'title' => 'required',
                    'page' => 'required',
                    'image' => 'image|mimes:jpg,jpeg,png',
                ],
            );
            if($req->file('image') ) {
                $path = 'uploads' ;
                $image = $this->file( $req->file('image') , $path,);
            }
            $category = new Posttype;
            // $fields = $imageName;
            $data = [
                'title'=>$req->title,
                'url'=>$req->url,
                'page'=>$req->page,
                'desc'=>$req->desc,
                'is_repeat'=>$req->is_repeat ?? '0',
                'bg_color'=>$req->bg_color,
                'fields'=>($req->is_repeat) ? json_encode($req->fields, TRUE) : '',
                'slug'=> $this->create_unique_slug($req->title,'posttype'),
                'image'=> $image ?? '', 
            ];
            $data = Posttype::create($data);
            $req->session()->flash('add_posttype', 'Add Data Successful!');
            return redirect()->route('admin/posttype'); 
        }
        return view('admin.pages.add_posttype');
    }
    public function posttypeview(Request $req , $id){
        $data = Posttype::findOrFail($id);
        $dataa = Postcontent::where('posttype_id', $req->id)->get();
        return view('admin.pages.posttypeview', ['data' => $data], ['dataa' => $dataa]);
    }
    public function posttypeview_status_update(Request $req, $status, $id){
        $postcontent = Postcontent::find($id);
        $postcontent->status = $status;
        $postcontent->save();
        $req->session()->flash('status', 'Status Updated Successfully.');
        return back();
    }
    public function postcontent_edit(Request $req, $posttype_id, $id){
        unset($req['_token']);
        $data = Posttype::findOrFail($posttype_id);
        $postcontent = Postcontent::find($id);
        if($req->method()=='POST'){
            foreach($req->input() as $key => $val){
                $data_insert[$key] = $val;
            }
            if(isset($_FILES)){
                foreach($_FILES as $key => $val){
                    if($req->$key && $val['name']) {
                        $path = 'uploads' ;
                        $data_insert[$key] = $this->file($req->$key , $path);
                        if(is_file("uploads/".$_POST[$key])){
                            unlink("uploads/".$_POST[$key]); 
                        }
                    }
                }
            }
            $postcontent = Postcontent::findOrFail($id);
            $postcontent->field = json_encode($data_insert, TRUE);
            $postcontent->save();
            return redirect()->back();
        }

        return view('admin.pages.postcontent_edit', compact('postcontent'), compact('data'));   
    }

    public function posttypeaddpost(Request $req , $id){
        
        $data = Posttype::findOrFail($id);
        unset($req['_token']);
        if($req->method()=='POST'){
            foreach($req->input() as $key => $val){
                $data_insert[$key] = $val;
            }
            if(isset($_FILES)){
                foreach($_FILES as $key => $val){
                    if($req->$key) {
                        $path = 'uploads' ;
                        $data_insert[$key] = $this->file($req->$key , $path);
                    }
                }
            }
            $dataa = [
                'posttype_id'=>($req->id),
                'field'=>json_encode($data_insert, TRUE),
            ];

            $data = Postcontent::create($dataa);
            return redirect('admin/addposttype/view/'.$id);
        }
        return view('admin.pages.posttypepostadd', ['data' => $data]);
        
    }
    
    
    
    
        public function posttypedeletpost(Request $req){
            
            $postdata = Postcontent::find($req->id);
            if($req->input()['image']){
                foreach(explode('and', $req->input()['image']) as $val){
                    if($val) {
                        if(is_file("uploads/".$val)){
                              unlink("uploads/".$val);
                        } 
                    }
                }
            }
            
            $data = Postcontent::where('id', $req->id)->delete();
            $req->session()->flash('delete_post', 'Delete Successful!');
            return redirect()->back();
            
        }
    
    
 
    
    
    
    
    

}
