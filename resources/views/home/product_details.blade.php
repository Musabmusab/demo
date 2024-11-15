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
    .product-container {
        background-color: #333;
        border-radius: 10px;
        padding: 30px;
        max-width: 1200px;
        width: 100%;
        margin-top: 40px;
        margin-bottom: 40px;
    }
    .product-title {
        color: #e63946;
    }
    .product-category {
        font-size: 1.1rem;
        color: #888;
    }
    .product-price {
        font-size: 1.5rem;
        color: #e63946;
    }
    .product-description{
        color: rgb(255, 255, 255);
    }
    .btn-red {
        background-color: #e63946;
        color: #fff;
        border: none;
    }
    .btn-red:hover {
        background-color: #d62828;
    }
    .product-image {
        border-radius: 10px;
        max-width: 100%;
        height: auto;
    }
</style>
<div class="container product-container">
<div class="row">

    <div class="col-md-6 text-center mb-4">
        <img src="/products/{{$data->image}}" alt="Product Image" class="product-image">
    </div>
    <!-- Product Details -->
    <div class="col-md-6">
        <p class="product-category">Category: {{$data->category}}</p>
        <h2 class="product-title">{{$data->title}}</h2>
        <p class="product-description">
            {{$data->description}}
        </p>
        <h4 class="product-price">{{$data->price}}</h4>

        <a class="btn btn-info ml-3" href="{{url('add_cart',$data->id)}}">Add to cart</a>
        </div>
    </div>
</div>

@include('home.footer')
</body>
</html>

