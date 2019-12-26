<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller{

	 // Add post go function here
	public function add_post_page(){
		$category = DB::table('categories')->get();
		return view('posts.add_post', compact('category'));
	}

	 // Add post function here
    public function add_post(Request $request){
    	$validatedData = $request->validate([
        'title'    	=> 'required|max:100',
        'image' 	=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'details'  	=> 'required|max:500|min:5',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['image'] = $request->image;
        $image = $request->file('image');

        if ($image){
        	$image_name = hexdec(uniqid());
        	$ext = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$ext;
        	$upload_path = 'public/frontend/postimage/';
        	$image_url = $upload_path.$image_full_name;
        	$success = $image->move($upload_path, $image_full_name);
        	$data['image'] = $image_url;
        	DB::table('posts')->insert($data);
        	
        	$notification = array(
    			'message'=>'Post inserted',
    			'alert-type'=>'success'
    		);

    		return Redirect()->back()->with($notification);
        }else{
        	$insert_post = DB::table('posts')->insert($data);
	        if ($insert_post) {
	            $notification = array(
	                'message'=>'Post Inserted Successfuly',
	                'alert-type'=>'success'
	            );
	            return Redirect()->back()->with($notification);
	        }
        }
    }

     // All post function here
    public function show_post(){
    	$posts= DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')
    			->select('posts.*', 'categories.name')
    			->get('');
    	return view('posts.show_post', compact('posts'));
    }

    // Single post function here
    public function single_post_view($id){
    	$posts= DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')
    			->select('posts.*', 'categories.name')
    			->where('posts.id', $id)
    			->first();
    	return view('posts.single_post_view', compact('posts'));
    }

    // Edit post page
    public function single_post_edit($id){
    	$category = DB::table('categories')->get();
    	$post = DB::table('posts')->where('id', $id)->first();
    	return view('posts.edit_post', compact('category', 'post'));
    }

    // Update post
    public function update_post(Request $request, $id){
    	$validatedData = $request->validate([
        'title'    	=> 'required|max:100',
        'image' 	=> 'mimes:jpeg,png,jpg,gif|max:2048',
        'details'  	=> 'required|max:500|min:5',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['image'] = $request->image;
        $image = $request->file('image');

        if ($image){
        	$image_name = hexdec(uniqid());
        	$ext = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$ext;
        	$upload_path = 'public/frontend/postimage/';
        	$image_url = $upload_path.$image_full_name;
        	$success = $image->move($upload_path, $image_full_name);
        	$data['image'] = $image_url;
        	unlink($request->old_image);
        	DB::table('posts')->where('id', $id)->update($data);
        	$notification = array(
    			'message'=>'Post Updated Successfuly',
    			'alert-type'=>'success'
    		);
    		return Redirect()->back()->with($notification);
        }else{
        	$data['image'] = $request->old_image;
        	DB::table('posts')->where('id', $id)->update($data);
	            $notification = array(
	                'message'=>'Post Updated Successfuly',
	                'alert-type'=>'success'
	            );
	            return Redirect()->back()->with($notification);
        }
    }

    public function single_post_delete($id){
    	$selectimg = DB::table('posts')->where('id', $id)->first();
    	$image = $selectimg->image;
    	$single_post_delete = DB::table('posts')->where('id',$id)->delete();
    	if ($single_post_delete){
    		unlink($image);
    		$notification = array(
            'message'=>'Post Deleted Successfuly',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
            'message'=>'Something Went Wrong',
            'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
    	}
    }
}
