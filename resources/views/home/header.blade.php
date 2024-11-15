<nav class="navbar navbar-expand-lg custom_nav-container ">
    <a class="navbar-brand" href="index.html">
      <span>
        E commerce
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('shopes')}}">
            Shop
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('why')}}">
            Why Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('testimonial')}}">
            Testimonial
          </a>
        </li>
      </ul>
      <div class="user_option">
        <style>
            #mm{
                background: #970000;
                color: white;
                border-radius: 20px;
            }
        </style>
          @if (Route::has('login'))
          @auth

          <a style="padding-left:12px" href="{{url('myorder')}}">
                       My Orders
          </a>
          {{-- add to cart --}}

          <a style="padding-left:12px" href="{{url('mycart')}}">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
               [{{$count}}]
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input id="mm" type="submit" value="Logout">
        </form>

         @else
          <a href="{{url('/login')}}">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>
            Login
          </span>
        </a>
        <a href="{{url('/register')}}">
            <i class="fa fa-vcard" aria-hidden="true"></i>
            <span>
             register
            </span>
          </a>
          @endif
          @endauth



      </div>
    </div>
  </nav>
