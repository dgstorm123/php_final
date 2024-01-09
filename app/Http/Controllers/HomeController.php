<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $post = Post::where('post_status','=','active') ->get();

            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user')
            {
                return view('home.homepage',compact('post'));
            }

            else if ($usertype == 'admin')
            {
                return view('admin.adminhome');
            }

            else
            {
                return redirect () -> back();
            }
        }
    }


    public function homepage()
    {   
        $post = Post::where('post_status','=','active') ->get();  # chỉ lấy các bài post có trạng thái active
        return view('home.homepage', compact('post'));
        
    }

    public function create_post()
        {
            $categories = Category::all();
            return view ('home.create_post',['categories' => $categories]);
        }

        public function user_post(Request $request)  # 
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
            
            $post -> post_status = 'waiting';
            $post -> user_id = $userid;
            $post -> usertype = $usertype;
            $post -> name = $name;


            $image = $request -> image ;   # lấy thông tin ảnh 
            if($image)
            {
            $imagename = time ().'.'.$image -> getClientOriginalExtension();
            $request -> image ->move('postimage',$imagename);
            $post -> image = $imagename;
            }
            $post -> save();
            return redirect()->back()->with('message','Create Post Successfully');
        }

        public function my_post()    # những bài post của mình
        {
            $user = Auth::user();
            $userid = $user -> id ;
            $data = Post::where('user_id','=',$userid) -> get();
            return view ('home.my_post',compact('data'));
        }



        public function post_details($id)    # phần readmore dưới mỗi bài post
        {
            $post = Post::find($id);
            return view ('home.post_details',compact('post'));
        }


        public function my_post_delete($id)  
        {
            $data = Post::find($id);   # tìm kiếm id của post

            $data -> delete();    # xoá 

            return redirect()->back()->with('message','Post Deleted Succesfully');   #Các  trả về mess sau khi xoá
        }

        public function my_post_edit($id)  
        {
            $data = Post::find($id);
            return view ('home.my_post_edit',compact('data'));
        }


       

   
}
