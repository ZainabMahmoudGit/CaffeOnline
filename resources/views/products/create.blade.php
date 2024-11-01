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
  </head>
  <body id="body-pd">
  <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
  <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="index.html" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">All Product</span> </a>
                <div class="nav_list"> <a href="Add_Product.html" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Add Product</span> </a> <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
		  
        <h4>ِAdd Products</h4>
		   <!------main-content-start-----------> 
           <div id="content">
           <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
           @csrf
      <div class="main-content">
      <label for="productNameInput">ProductName :</label>
      <input type="text"class="form-control mb-3" id="productNameInput"
      name="ProductName" 
      value="{{old('ProductName')}}">
      @error("ProductName")
        <p class="text-danger"> {{$message}} </p>
      @enderror 

      <label for="description">Description :</label>
      <input type="text"class="form-control mb-3" id="description"
      name="description" 
      value="{{old('description')}}">
      @error("description")
        <p class="text-danger"> {{$message}} </p>
      @enderror 
    
      <label for="productNameInput">PriceBeforeDiscount :</label>
    
      <input  type="number"class="form-control m-3" id="productPriceInput"placeholder="PriceBeforeDiscount"
      name="PriceBeforeDiscount"  value="{{old('PriceBeforeDiscount')}}">
        @error("PriceBeforeDiscount")
          <p class="text-danger"> {{$message}} </p>
        @enderror
        <label for="productNameInput">Discount :</label>
    
      <input onkeyup="getTotal();"  type="number"class="form-control m-3" id="Discount"placeholder="Discount"
      name="Discount"  value="{{old('Discount')}}">
     
      <label for="productNameInput">PriceAfterDiscount :</label>
    
      <input onkeyup="getTotal();"  type="number"class="form-control m-3" 
      id="productTaxsInput"placeholder="PriceAfterDiscount"
      name="PriceAfterDiscount"  value="{{old('PriceAfterDiscount')}}">
      
      <input onkeyup="getTotal();"  type="number"class="form-control m-3" 
      id="productTaxsInput"placeholder="quantity"
      name="quantity"  value="{{old('quantity')}}">
  


      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Image</label>
        <input type="file" class="form-control" name="image"  value="{{old('image')}}">
        @error("PriceBeforeDiscount")
          <p class="text-danger"> {{$message}} </p>
        @enderror
    </div>
    <label for="exampleInputEmail1" class="form-label">Category </label>

<select class="form-select" name="category_id" aria-label="Default select example">
  @foreach ($categorys as $category)
    <option value="{{$category->id}}">{{$category->CategoryName}}</option>
  @endforeach

</select>

      
      <button type="submit" class="btn btn-info d-block"id="btnProduct">create</button>

  </div>
  </form>
	     
           
    
    </div>

</div>

    <!----footer-design------------->
    
 



<!-------complete html----------->






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>


    </div>
    </body>
  </html>