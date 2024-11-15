<!DOCTYPE html>
<html>
<head>
    @includeIf('home.css')
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
@includeIf('home.header')
    </header>



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
        <h2 class="text-center mb-4">My Order Details</h2>

        <div class="table-responsive">
          <table class="table table-dark table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Image</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($order as $order)
              <tr>

                <td>{{$order->product->title}}</td>
                <td>${{$order->product->price}}/-</td>
                <td>{{$order->status}}</td>
                <td><img width="100" src="products/{{$order->product->image}}" alt=""></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>



</body>
</html>
