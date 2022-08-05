<html lang="en">

<head>
  <title>Detail Product</title>
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
  <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
</head>
<body>
	@if($product)
	  <div class="wrapper">
	    <div class="product-img">
	      <img src="{{URL::asset('/images/products/'.$img)}}"height="420" width="327">
	    </div>
	    <div class="product-info">
	      <div class="product-text">
	        <h1>{{$product->name}}</h1>
	        <h2>The best product</h2>
	        <p>{{ $product->description}}</p>
	      </div>
	      <div class="product-price-btn">
	        <p><span>{{ $product->price}}</span>€</p>
	        <div  class="brand">{{$product->brand->name}}</div>

	      </div>
	      <div class="product-price-btn">
	        <button onclick="location.href='{{ route('products') }}'" type="button">Back</button>
	      </div>
	    </div>
	  </div>
	 @else
	 	<p>No se ha encontrado ningún producto</p> 
	 	<button onclick="location.href='{{ route('products') }}'" type="button">Back</button>
	@endif
</body>
</html>

