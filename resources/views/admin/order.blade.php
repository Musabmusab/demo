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
                body {
                  background-color: #121212; /* Dark Background */
                  color: #ffffff;
                }
                .table thead {
                  background-color: #b71c1c; /* Red Background for Header */
                }
                .table tbody tr {
                  border-bottom: 1px solid #444;
                }
                .table-dark {
                  color: #ffffff;
                }
                .container {
                  max-width: 1200px;
                  margin-top: 50px;
                }
                .table-responsive {
                  border-radius: 8px;
                  overflow: hidden;
                }
              </style>
               <div class="container">
                <h2 class="text-center mb-4">Order Details</h2>

                <div class="table-responsive">
                  <table class="table table-dark table-striped text-center">
                    <thead>
                      <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Progress</th>
                        <th scope="col">Change Status</th>
                        <th scope="col">Print </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data )


                      <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->rec_address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->product->title}}</td>
                        <td>{{$data->product->price}}</td>
                        <td> <img width="100" src="products/{{$data->product->image}}" ></td>
                        <td>{{$data->payment_status}}</td>
                        <td>
                            @if($data->status == 'in progress') <span style="color:red">{{$data->status}}</span>
                            @elseif ($data->status == 'Delivered')<span style="color:rgb(15, 254, 39)">{{$data->status}}</span>
                            @else <span style="color:rgb(200, 2, 226)">{{$data->status}}</span> @endif
                        </td>

                        <td>
                            <a href="{{url('on_the_waye',$data->id)}}" class="btn btn-danger p-1 m-1">On the Way</a>
                            <a href="{{url('deliverede',$data->id)}}" class="btn btn-info p-1 ">Delivered</a>
                        </td>
                         <td><a href="{{url('print',$data->id)}}"><button class="btn btn-secondary">Print pdf</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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
