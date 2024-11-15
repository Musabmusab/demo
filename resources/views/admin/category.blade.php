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

<h1>Add Category</h1>
<style>
    input[type='text']{
        width: 400px;
        height: 50px;
    }
    .m{
        display: flex;
        justify-content: center;
        align-items:center;
        margin: 30px;

    }
    .mn{
        width: 600px;
    }
    .bg{
        font-weight: bold;
        padding: 15px;
        background: #114f82;
        color: rgb(255, 255, 255)
    }
    .bgc{
        border: 2px solid skyblue;
        padding: 10px;
        color: rgb(255, 255, 255)
    }
</style>

         <div class="m"><form action="add_category" method="post">
            @csrf
            <input type="text" name="category" >
            <button class="btn btn-primary">Add Category</button>
         </form></div>

       <div class="flex justify-center align-items-center m-10">

         <table border="2" class=" mn text-center w-10 m-auto border border-solid border-yellow-400">
            <tr>
                <th class="bg">Category Name</th>
                <th class="bg">Delete</th>


            </tr>
            @foreach ($data as $data)
            <tr>
                <th  class="bgc">{{$data->category_name}}</th>
                <th class="bgc" ><a class="btn btn-danger"  href="{{url('delete_category',$data->id)}}">Delete</a></th>

            </tr>
            @endforeach

         </table>
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
