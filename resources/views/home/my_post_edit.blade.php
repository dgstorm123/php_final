<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <!-- CSS -->
      <base href = "/public">
      @include ('home.homecss')
      <style>
        /* Place your CSS styles here */

        .post-editor {
          width: 500px;
          margin: 0 auto;
          padding: 20px;
          border: 1px solid #ccc;
        }

        .heading {
          text-align: center;
          font-size: 20px;
          font-weight: bold;
          color:white;
        }

        .box {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
        }

        .flex-btn {
          display: flex;
          justify-content: center;
          text-align: center;
          margin: 0 auto;
          color: black;
        }

        
        .btn {
            background-color: black;  /* change the button color to white */
            color: black; /* change the text color to black for better contrast */
            border: 2px solid black; /* add a border to the button */
            transition: background-color 0.3s ease; /* add a transition effect when the color changes */
        }

        .btn:hover {
            background-color: red; /* change the button color to red when the mouse hovers over it */
            color: black; /* change the text color to white when the mouse hovers over it */
        }
      </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
        
        <!-- header section end -->
       
        <section class="post-editor">
            <h1 class="heading">Edit My Post</h1>
            <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
            
                @csrf
                @method('PUT') <!-- Sử dụng method PUT cho việc cập nhật -->
                    <input type="text" name="name" value="" hidden>
                    
                    <p>Post Title <span>*</span></p>
                    <input type="text" name="title" maxlength="100" required placeholder="Add post title" class="box" value="{{$data->title}}">
                    
                    <p>Post Description <span>*</span></p>
                    <textarea name="description" class="box" required maxlength="10000" placeholder="Write your content..." cols="30" rows="10">{{$data->description}}</textarea>
                   
                    <p>Post Category <span>*</span></p>
                    <select name="category" class="box" required>
                        <option value="" selected disabled>-- Select Category* </option>
                        <option value="study coffee">study coffee shop</option>
                        <option value="study place">study place for quite </option>
                        <option value="coffee shop for vibe">coffee shop for vibe</option>
                        <option value="local food">local food</option>
                    </select>


                    <p>District <span>*</span></p>
                <select name="district" class="box" required>
                    <option value="" selected disabled>-- Select district* </option>
                    <option value="Ba Đình">Ba Đình</option>
                    <option value="Hoàn Kiếm">Hoàn Kiếm</option>
                    <option value="Hai Bà Trưng">Hai Bà Trưng</option>
                    <option value="Đống Đa">Đống Đa</option>
                    <option value="Tây Hồ">Tây Hồ</option>
                    <option value="Cầu Giấy">Cầu Giấy</option>
                    <option value="Thanh Xuân">Thanh Xuân</option>
                    <option value="Hoàng Mai">Hoàng Mai</option>
                    <option value="Long Biên">Long Biên</option>
                    <option value="Nam Từ Liêm">Nam Từ Liêm</option>
                    <option value="Bắc Từ Liêm">Bắc Từ Liêm</option>
                    <option value="Hà Đông">Hà Đông</option>
                </select>

                    <p>Post Image</p>
                    <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">

                    <div class="flex-btn">
                        <input type="submit" value="submit" name="publish" class="btn">
                    </div>
            </form>
        </section>

      </div>

   </body>
</html>
