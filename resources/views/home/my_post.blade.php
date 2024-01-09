<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <style>
    /* Reset some default styling */
    body, h1, h2, p, table {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .post-editor {
      width: 80%;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .heading {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .img_deg {
      height: 80px;
      width: 120px;
      object-fit: cover;
    }
  </style>
      <!-- CSS -->
      @include ('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
      </div>


      <div class="page-content">
      <section class="post-editor">

        @if(session () -> has ('message'))
            <div class = "alert alert-danger ">
                <button type="button" class = "close" data-dismiss ="alert" aria-hidden="true">x</button>
                {{session() -> get('message')}}
            </div>

        @endif

        <h1 class="heading">My Post</h1>

        <table>
          <tr>
            <th>Post Title</th>
            <th>Description</th>
            <th>Name</th>
            <th>Category</th>
            <th>Post By</th>
            <th>Status</th>
            <th>User Type</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>

          @foreach($data as $data)
            <tr>
              <td>{{$data->title}}</td>
              <td>{{$data->description}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->category}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->post_status}}</td>
              <td>{{$data->usertype}}</td>
              <td>
                <img class="img_deg" src="postimage/{{$data->image}}" alt="Post Image">
              </td>

                    <td>
                        <a href="{{url('my_post_delete' ,$data->id)}}" class="btn btn-danger" onClick = "return confirm('Are You Sure Want To Delete this ?')">Delete</a>
                    </td>

                    <td>
                        <a href="{{url('my_post_edit' ,$data->id)}}" class="btn btn-danger">Edit</a>
                    </td>
            </tr>
          @endforeach

        </table>
      </section>
    </div>
   </body>
</html>