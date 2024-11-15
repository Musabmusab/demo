<!DOCTYPE html>
<html>
<head>
    @includeIf('home.css')
</head>
<body>
  <div class="hero_area">
    <header class="header_section">
        @include('home.header')
    </header>
    <style>
        /* Dark and red theme styling */
        body {
          background-color: #121212;
          color: #f5f5f5;
        }
        .table-dark {
          background-color: #1c1c1c;
        }
        .btn-red {
          background-color: #ff4c4c;
          color: white;
        }
        .btn-red:hover {
          background-color: #ff3333;
        }
      </style>
        <div class="container py-5">
            <h2 class="text-center mb-4">Shopping Cart</h2>

            <!-- Cart Table -->
            <div class="table-responsive">
              <table class="table table-dark table-bordered text-center">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>image</th>
                  </tr>
                </thead>

                <tbody>
          <?php $value=0; ?>
                   @foreach ($cart as $cart )
                  <tr>
                   <td>{{$cart->product->title}}</td>
                   <td>{{$cart->product->price}}/-</td>
                    <td>
                        <img width="100" src="/products/{{$cart->product->image}}">
                    </td>

                                  </tr>
               <?php $value = $value + $cart->product->price ; ?>

                 @endforeach
               </tbody>
                <tfoot>
                    <tr>
                      <th colspan="2">Grand Total</th>
                      <th colspan="2">Rs.{{$value}} /-</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
        <!-- Checkout Form -->
        <div class="card bg-dark text-light mt-4">
            <div class="card-body">
              <h3 class="card-title">Checkout</h3>
              <form action="{{url('confirm_ordere')}}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{Auth::user()->name}}" required>
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">phone no.</label>
                  <input type="number" name="phone" class="form-control"  value="{{Auth::user()->phone}}" id="phone" required>
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" name="address" id="address" rows="2" required>{{Auth::user()->address}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="paymentMethod" class="form-label">Payment Method</label>
                   <button type="submit" class="btn btn-red ">Cash on Delivery</button>

                </div>
                {{-- <button type="submit" class="btn btn-red w-100">Place Order</button> --}}
              </form>
              <a href="{{url('stripe',$value)}}"><button class="btn btn-info ">Pay using Card</button></a>
            </div>
          </div>
        </div>
  </div>



@include('home.footer')
  </div>
</body>
</html>

