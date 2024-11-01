@php
    $websiteinfo = \App\Models\Websiteinfos::first();
    
    $home = \App\Models\Home::first();
     // Fetch the first record
@endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>crud dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const toggleButton = document.getElementById('header-toggle');
        const navBar = document.getElementById('nav-bar');
        const bodyPd = document.getElementById('body-pd');
        const header = document.getElementById('header');

        // Show navbar
        toggleButton.addEventListener('click', () => {
            // add or remove the show class to the navbar, body, and header
            navBar.classList.toggle('show');
            toggleButton.classList.toggle('bx-x');
            bodyPd.classList.toggle('body-pd');
            header.classList.toggle('body-pd');
        });
    });
</script>
  </head>
  <body id="body-pd">
  <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
  <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="{{route('products.index')}}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">All Product</span> </a>
                <div class="nav_list">
               <!-- In your dashboard blade view -->


<a href="{{ route('websiteinfos.edit', ['websiteinfo' => $websiteinfo->id]) }}" class="nav_link active">
    <i class='bx bx-grid-alt nav_icon'></i>
    <span class="nav_name">Edit Info of website</span>
</a>


<a href="{{ route('home.edit', ['home' => $home->id]) }}" class="nav_link active">
    <i class='bx bx-grid-alt nav_icon'></i>
    <span class="nav_name">Edit Info of website</span>
</a>


                     <a href="{{route('products.create')}}" class="nav_link active">
                     <i class='bx bx-grid-alt nav_icon'></i> 
                     <span class="nav_name">Add Product</span> 
                    </a> 

                     <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i>
                      <span class="nav_name">Users</span> </a> 
                      <a href="{{route('contactus.index')}}" class="nav_link">
                         <i class='bx bx-message-square-detail nav_icon'></i> 
                         <span class="nav_name">view client Messages</span>
                         </a>
                               </div>   </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
		  
   
        
    
    </div>

</div>

    <!----footer-design------------->
    
 



<!-------complete html----------->








    </div>
    </body>
  </html>