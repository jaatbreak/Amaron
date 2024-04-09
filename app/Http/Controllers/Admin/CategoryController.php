<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\Common_trait;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
class CategoryController extends Controller
{
    
    use Common_trait;
    public function category(Request $request){
        
        
        if ($request->ajax()) {
            $users = Category::orderBy("id", "asc");
            return DataTables::of($users)
            ->editColumn('thumbnail', function ($contact){
                  if($contact->thumbnail){ return 'uploads/'.$contact->thumbnail; }else{ return 'admin/1.png'; };
            })
            ->editColumn('banner_image', function ($contact){
                  if($contact->banner_image){ return 'uploads/'.$contact->banner_image; }else{ return 'admin/1.png'; };
            })
            ->toJson();
         }

        return view('admin.pages.category');
    }

    public function add_category(Request $req){
        if($req->method()=='POST'){
            $validated = $req->validate(  
                [
                    'title' => 'required|unique:category',
                    'thumbnail' => 'image|mimes:jpg,jpeg,png',
                    'banner_image' => 'image|mimes:jpg,jpeg,png'
                ],
            );
            if($req->file('thumbnail') ) {
                $path = 'uploads' ;
                $url = $this->file( $req->file('thumbnail') , $path,);
            }
            if($req->file('banner_image') ) {
                $path = 'uploads';
                $url1 = $this->file($req->file('banner_image') ,$path,);
            }
            $category = new Category;
            $data = [
                'title'=>$req->title,
                'slug'=> $this->create_unique_slug($req->title,'category'),
                'desc'=>$req->desc,
                'thumbnail'=> $url ?? '',
                'banner_image'=>$url1 ?? '',
                'parent'=> $req->parent,
                'meta_title'=>$req->meta_title,
                'meta_content'=>$req->meta_content,
                'meta_keyword'=>$req->meta_keyword,
            ];
            $data = Category::create($data);
            $req->session()->flash('add_category', 'Add Category Successful!');
            return redirect()->route('admin/product/category');    
        }
        $cat_data['category'] =  Category::all();
        return view('admin.pages.add_category',$cat_data);
    }
  
    public function delete_category(Request $req){
            $image = Category::find($req->id);
            if(is_file("uploads/".$image->thumbnail)){
                unlink("uploads/".$image->thumbnail); 
            }
            if(is_file("uploads/".$image->banner_image)){
                unlink("uploads/".$image->banner_image); 
            }
        $data = Category::where('id', $req->id)->delete();
        $req->session()->flash('delete_category', 'Delete Category Successful!');
        return redirect()->route('admin/product/category');
    }

    public function update_status_category(Request $req){
        $category = Category::findOrFail($req->id);
        $category->status = $req->status;
        $category->save();
        return response()->json(['message' => 'Category status updated Successfully.']);
    }

    public function edit_category(Request $req, $id){
        $dataa = Category::findOrFail($id);
        $data['category'] =  Category::all();
        if($req->method()=='POST'){
            $image = Category::find($req->id);
            $validated = $req->validate(
                [
                    'title' => 'required|unique:category,title,'.$id,
                    'thumbnail' => 'image|mimes:jpg,jpeg,png',
                    'banner_image' => 'image|mimes:jpg,jpeg,png'
                ],
            );

            $url = $req->old_thumbnail;
            $url1 = $req->old_banner_image;

                if($req->file('thumbnail')) {
                    if(is_file("uploads/".$req->old_thumbnail)){
                        unlink("uploads/".$req->old_thumbnail); 
                    }
                    $path = 'uploads' ;
                    $url = $this->file( $req->file('thumbnail') , $path);
                }
                if($req->file('banner_image')) {
                    if(is_file("uploads/".$req->old_banner_image)){
                        unlink("uploads/".$req->old_banner_image); 
                    }
                    $path = 'uploads';
                    $url1 = $this->file($req->file('banner_image') ,$path);
                }
            $category = new Category;
            $data = [
                'title'=>$req->title,
                'slug'=> $this->create_unique_slug($req->title,'category'),
                'desc'=>$req->desc,
                'thumbnail'=> $url,
                'banner_image'=>$url1,
                'parent'=> $req->parent,
                'meta_title'=>$req->meta_title,
                'meta_content'=>$req->meta_content,
                'meta_keyword'=>$req->meta_keyword,
            ];
            Category::where('id',$id)->update($data);
            $req->session()->flash('edit_category', 'Edit Category Successful!');
            return redirect()->route('admin/product/category');
        }
        return view('admin.pages.edit_category', ['edit_category' => $dataa], $data);
    }
    
    // ,Rule::unique('category')->ignore($id)

}
