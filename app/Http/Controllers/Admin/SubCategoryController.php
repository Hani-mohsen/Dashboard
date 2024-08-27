<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Allsubcategory(){
        $subCategory = SubCategory::all();
        return view('backend.subcategory.allsubcategory',compact('subCategory'));

    }
    public function Addsubcategory(){
        $Category=Category::all();
        return view('backend.subcategory.addsubcategory',compact('Category'));

    }
    public function Storesubcategory(Request $request){
        $request->validate([
            'category_name'=>'required',
            'subcategory_name'=>'required',

        ]);
        SubCategory::insert([
            'category_name' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);

    }
    public function Deletesubcategory($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function Editsubcategory($id){
        $Category=Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('subcategory','Category'));
    }
    public function Updatesubcategory(Request $request,$id){
        SubCategory::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
        ]);
        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_name',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }
}
