<!DOCTYPE html>
<html lang="en">
   <head>
    <base href = "/public">

      @include ('home.homecss')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
      
      </div>
            
                  <div style ="text-align:center; height : 400px ; width: 550px; margin:auto; " class="col-md-12">
                     <div><img style = "padding: 20px" src="/postimage/{{$post->image}}" class="services_img"></div>
                     <h4>{{$post->title}}</h4>
                     <h4>{{$post->description}}</h4>
                     <p>Post by <b>{{$post->name}} </b></p>
                     
                  </div>

            @include('home.footer') 
        <!-- footer section end -->
   </body>
</html>