<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;


class Admincontroller extends Controller
{
    public function post_page()
    {
        $categories = Category::all(); // lấy tất cả các giá trị category sau khi add từ trong database 
        return view('admin.post_page', ['categories' => $categories]); // gửi giá category vào trong file blade admin.post_page
    }

    public function user_count()
    {
        // Sử dụng hàm count() để đếm số lượng người dùng
        $usercount = User::count();

        // Truyền số lượng người dùng vào view admin.body
        return view('admin.body', ['usercount' => $usercount]);
    }




    public function showAddCategoryForm()  # đường dẫn đến form thêm category 
    {
        return view('admin.add_category');
    }

    public function add_category(Request $request)   # thực hiện chức năng thêm category vào database
    {
        try {
            $category = new Category;
            $category->name = $request->name;
            $category->save();

            $categories = Category::all(); // Retrieve all categories

            return view('admin.add_category', ['categories' => $categories])
                ->with('message', 'Category added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function add_post(Request $request)
    {
        $user = Auth() -> user ();
        $userid = $user -> id;
        $name = $user -> name;
        $usertype = $user -> usertype;

        $post = new Post;
        $post -> title = $request -> title ;
        $post->description = $request->description;
        $post -> category = $request -> category ;
        $post -> district = $request -> district ;
        
        $post -> post_status = 'active';
        $post -> user_id = $userid;
        $post -> usertype = $usertype;
        $post -> name = $name;

        $image = $request -> image ;
        if($image)
        {
        $imagename = time ().'.'.$image -> getClientOriginalExtension();
        $request -> image ->move('postimage',$imagename);
        $post -> image = $imagename;
        }
        $post -> save();
        return redirect()->back()->with('message','Create Post Successfully');
    }


    public function show_post()
    {
        $post = Post::all();
        return view ('admin.show_post', compact('post'));
    }


    public function delete_post($id)
    {
        $post = Post::find($id);

        $post -> delete();

        return redirect()->back()->with('message','Post Deleted Succesfully');
    }

    public function edit_post($id)
    {
        $post = Post::find($id);
        return view ('admin.edit_post',compact('post'));
    }


    public function accept_post($id)    # chức năng chấp nhận bài viết dựa trên tìm id người dùng và chuyển đổi post_status từ pending thành activate
    {
        $data = Post::find($id);
        $data -> post_status ='active';
        $data -> save();
        return redirect() -> back() -> with('message', 'Post Status Changed To Activate');

    }


    public function reject_post($id)
    {
        $data = Post::find($id);
        $data -> post_status ='rejected';
        $data -> save();
        return redirect() -> back() -> with('message', 'Post Status Changed To rejected');
    }
    
}
