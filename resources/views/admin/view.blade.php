<!DOCTYPE html>
<html>
  <head>
@include('admin.css')
  </head>
  <body>
    <header class="header">
@include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.csb')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


            <div class="container mt-5">
                <h2 class="text-center">Product View Table</h2>


                <table class="table table-dark table-hover mt-4">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Price</th>
                      <th scope="col">Description</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Image</th>
                      <th scope="col">update</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($product as $product)
                    <tr>
                      <th scope="row">{{$product->id}}</th>
                      <td class="dd">{{$product->title}}</td>
                      <td>{{$product->category}}</td>
                      <td> {{$product->price}} $</td>
                      {{-- <td>{{$product->description}}</td> --}}
                      <td>{!!Str::limit($product->description,20)!!}</td>
                      <td>{{$product->quantity}}</td>
                      <td><img  height="60" width="60" src="products/{{$product->image}}" alt="Product img" class="product-img"></td>
                      <td><a class="btn btn-info"  href="{{url('update_product',$product->id)}}">Update</a></td>
                      <td><a class="btn btn-danger"  href="{{url('delete_product',$product->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>



              </div>

              {{-- {{$product->links()}} --}}
          </div>
      </div>
    </div>

    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
