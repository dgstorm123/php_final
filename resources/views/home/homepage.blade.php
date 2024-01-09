<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <!-- CSS -->
      @include ('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->
        @include('home.banner')
         <!-- banner section end -->
      </div>
        <!-- header section end -->
        <!-- services section start -->
            @include('home.services')
        <!-- services section end -->

      <!-- blog section start -->
      
      <!-- blog section end -->
      
      <!-- client section start -->

        <!-- client section start -->
        
        <!-- choose section start -->
        <!-- choose section end -->

        <!-- footer section start -->
            @include('home.footer') 
        <!-- footer section end -->
   </body>
</html>