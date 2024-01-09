<!DOCTYPE html>
<html>
<head> 
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
    }
    .box {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
    }
    .flex-btn {
      display: flex;
      justify-content: space-between;
    }
  </style>

  <base href = "/public">
  @include('admin.admincss')
</head>
<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.slidebar')
    <!-- Sidebar Navigation end-->
    <div class ="page-content">
      <section class="post-editor">
        <h1 class="heading">Update Post</h1>
        <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT') <!-- Sử dụng method PUT cho việc cập nhật -->
          <input type="text" name="name" value="" hidden>
          <p>Post Title <span>*</span></p>
          <input type="text" name="title" maxlength="100" required placeholder="Add post title" class="box" value="{{$post->title}}">
          <p>Post Description <span>*</span></p>
          <textarea name="description" class="box" required maxlength="10000" placeholder="Write your content..." cols="30" rows="10">{{$post->description}}</textarea>
          <p>Post Category <span>*</span></p>
          <select name="category" class="box" required>
                    <option value="" selected disabled>-- select category* </option>
                    <option value="study coffee">study coffee shop</option>
                    <option value="study place">study place for quite </option>
                    <option value="coffee shop for vibe">coffee shop for vibe</option>
                    <option value="local food">local food</option>
                </select>

                    <p>District <span>*</span></p>
                <select name="district" class="box" required>
                    <option value="" selected disabled>-- Chọn quận* </option>
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
            <input type="submit" value="Update" name="update" class="btn">
          </div>
        </form>
      </section>
    </div>
    <!-- footer -->
    @include('admin.footer')
  </div>
</body>
</html>
