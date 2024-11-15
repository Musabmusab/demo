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
            <style>
                /* Custom dark and red color theme */
                body {
                    background-color: #200404;
                    color: #000000;
                }
                .form-container {
                    background-color: #333;
                    border-radius: 10px;
                    padding: 20px;
                }
                .form-container h2 {
                    color: #e63946; /* Red color */
                }
                .form-label {
                    color: #ffffff;
                }
                .btn-red {
                    background-color: #e63946;
                    color: #a70b0b;
                    border: none;
                }
                .btn-red:hover {
                    background-color: #d62828;
                }
                .te{
                    background: #000;
                    color: wheat;
                }
            </style>
 <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="form-container p-4">
                <h2 class="text-center mb-4">Add New Product</h2>
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="productTitle" class="form-label">Product Title</label>
                        <input type="text" name="title"  required class="form-control" id="productTitle" placeholder="Enter product Title">
                    </div>

                    <!-- Product Description -->
                    <div class="form-group">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" required name="description" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
                    </div>

                    <!-- Product Price -->
                    <div class="form-group">
                        <label for="productPrice" class="form-label">Product Price</label>
                        <input type="number" name="price" required class="form-control" id="productPrice" placeholder="Enter product price">
                    </div>
                     <!-- Product quantity -->
                     <div class="form-group">
                        <label for="productquantity" class="form-label">Product Quantity</label>
                        <input type="text" name="qty" required class="form-control" id="productquantity" placeholder="Enter product quantity">
                    </div>

                     <!-- Product category -->
                     <div class="form-group">
                        <label for="productcategory" class="form-label">Product Category</label>
                              <select class="form-control" name="category"  >
                                <option>Seletc a Option</option>

                                @foreach ($category as $category)

                                 <option class="te" value="{{$category->category_name}}">{{$category->category_name}}</option>

                                @endforeach
                              </select>
                    </div>

                    <!-- Product Image Upload -->
                    <div class="form-group">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control-file" id="productImage">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-red">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
