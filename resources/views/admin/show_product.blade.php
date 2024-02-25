<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">

    .center
    {
      margin: auto;
      width: 50%;
      border: 2px solid white;
      text-align: center;
      margin-top: 40px;
    }
    .font_size 
    {
      text-align: center;
      font-size: 40px;
      padding-top: 20px;
    }
    .img_size 
    {
      width: 150px;
      height: 150px;
    }
    .th_color
    {
      background: skyblue;
    }
    .th_deg
    {
      padding: 30px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

              @if (session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                {{session()->get('message')}}
              </div>
              @endif

              <h2 class="font_size">All Products</h2>
                <table class="center">

                    <tr class="th_color">
                        <td class="th_deg">Product Title</td>
                        <td class="th_deg">Description</td>
                        <td class="th_deg">Quantity</td>
                        <td class="th_deg">Category</td>
                        <td class="th_deg">Price</td>
                        <td class="th_deg">Discount Price</td>
                        <td class="th_deg">Prouduct Image</td>
                        <td class="th_deg">Edit</td>
                        <td class="th_deg">Delete</td>

                    </tr>

                    @foreach ($product as $product)
                        
                    <tr>
                      <td>{{$product->title}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>{{$product->category}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->discount_price}}</td>
                      <td>
                        <img class="img_size" src="/product/{{$product->image}}">
                      </td>
                      <td>
                        <a class="btn btn-success" href="{{url('edit_product', $product->id)}}">Edit</a>
                      </td>
                      <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This')" href="{{url('delete_product', $product->id)}}">Delet</a>
                      </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div> 
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin/script')
    <!-- End custom js for this page -->
  </body>
</html>