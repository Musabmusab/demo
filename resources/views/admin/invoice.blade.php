<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>
<body>
    <div >

        <center> <div >
          <h3 >Customer Name : {{$data->name}}</h3>
          <h3 >Product Title : {{$data->product->title}}</h3>
          <h3 >Address : {{$data->rec_address}}</h3>
          <h3>Product Price : {{$data->product->price}}</h3>
        </div></center>
        <center> <img width="300" height="250" src="products/{{$data->product->image}}" class="card-img-top" alt="Product Image"></center>
    </div>
</body>
</html>
</body>
</html>


