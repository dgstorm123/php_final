<!DOCTYPE html>
<html>
  <head> 
        @include('admin.admincss')
  </head>
  <body>
        @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
            @include('admin.slidebar')
        <!-- Sidebar Navigation end-->
        <div class ="page-content">

            <!-- body -->
            @include('admin.body')

            
            <!-- footer -->
                @include('admin.footer')
        </div>
  </body>
</html>