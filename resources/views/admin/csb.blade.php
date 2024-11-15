<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="musab" class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Musab Asgahr</h1>
        <p>Web Developer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="admin/dashboard"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{url('view_categoty')}}"> <i class="icon-grid"></i>Category</a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="add_producte">Add products</a></li>
                <li><a href="{{url('view_producte')}}">View Product</a></li>

              </ul>
            </li>
            <li><a href="{{url('view_orders')}}"> <i class="icon-grid"></i>Orders</a></li>
        </ul>

  </nav>

