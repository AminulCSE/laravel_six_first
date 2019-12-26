<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller{

    public function add_cat(){
    	return view('category.addcat');
    }
 
    public function store_category(Request $request){

    	$validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug'  => 'required|unique:categories|max:25|min:4',
   		]);


    	$data = array();
    	$data['name'] = $request->name;
    	$data['slug'] = $request->slug;

    	$category = DB::table('categories')->insert($data);

    	if ($category) {
    		$notification = array(
    			'message'=>'successfully inserted',
    			'alert-type'=>'success'
    		);
    		return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
    			'message'=>'not success',
    			'alert-type'=>'error'
    		);
    		return Redirect()->back()->with($notification);
    	}
    }


    public function show_cat(){
    	$category = DB::table('categories')->get();

    	return view('category.show_cat', compact('category'));
    }


    public function single_cat_view($id){
    	$category = DB::table('categories')->where('id', $id)->first();
    	return view('category.single_cat_view')->with('cat', $category);
    }



    public function single_cat_delete($id){
    	$category = DB::table('categories')->where('id', $id)->delete();

    	if ($category) {
    		$notification = array(
    			'message'=>'Successfuly Deleted !',
    			'alert-type'=>'success'
    		);
    		return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
    			'message'=>'Not Deleted',
    			'alert-type'=>'error'
    		);
    		return Redirect()->back()->with($notification);
    	}
    }


    public function single_cat_edit($id){
    	$category = DB::table('categories')->where('id', $id)->first();
    	return view('category.editcat',compact('category'));
    }




    public function update_category(Request $request, $id){
        $validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'slug'  => 'required|max:25|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        $category = DB::table('categories')->where('id', $id)->update($data);

        if ($category) {
            $notification = array(
                'message'=>'Updated Successfuly',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Not Updated',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }


}
