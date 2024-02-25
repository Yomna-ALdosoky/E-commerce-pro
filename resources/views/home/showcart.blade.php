<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>

      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      


      <style type="text/css">
        .center {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;

        }
        table,th,td {
            border: 1px solid gray;
        }
        .th_deg {
            font-size: 30px;
            padding: 5px;
            background: skyblue;
        }
        .img_deg {
            height: 200px;
            width: 200px;
        }
        .total_deg {
            font-size: 20px;
            padding: 40px
        }
      </style>
   </head>
   <body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            {{session()->get('message')}}
          </div>
        @endif
        <div class="center">
          
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>
                
                <?php $totalprice=0; ?>
                @foreach ($cart as  $cart)

                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}</td>
                    <td>
                        <img class="img_deg" src="/product/{{$cart->image}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure To Remove This Product ?')" href="{{url('remove_cart', $cart->id)}}">Remove Product</a>
                    </td>
                </tr>
                
                <?php $totalprice= $totalprice + $cart->price ?>
                
                @endforeach
            </table>
            <div>
                <h1 class="total_deg">Total Price : ${{$totalprice}}</h1>
            </div>

            <div>
                <h1 style="font-size: 25px; padding-bottom: 15px">Proceed To Order</h1>  {{-- الدفع عند الاستلام --}}
                <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a> {{-- الدفع بستخدام البطاقه --}}
                <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using cart</a>
            </div>
        
        
        
        </div>
      
   
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
    </div>

      <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
      <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
      <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
      <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
      <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script> 
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="admin/assets/js/off-canvas.js"></script>
      <script src="admin/assets/js/hoverable-collapse.js"></script>
      <script src="admin/assets/js/misc.js"></script>
      <script src="admin/assets/js/settings.js"></script>
      <script src="admin/assets/js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="admin/assets/js/dashboard.js"></script>


   </body>
</html>