<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Carmishop online</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Estilo general-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('products') }}">Carmishop <i class="bi-cart-fill me-1"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    </ul>
                    <!-- Filtro/Buscador -->
                    <form method="POST" action="/search" >
                            @csrf
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item" style="margin-right: 20px;">  
                                <input placeholder="name" type="text" name="name"  value="{{$namesearch ?? '' }}">
                            </li>
                            <li class="nav-item" style="margin-right: 20px;">  
                                <select class="form-select" name="brand" id="brand">
                                  <option></option>
                                    @foreach ($brands as $brand)                                    
                                            @if( isset($brandsearch) && $brandsearch == $brand->id):
                                                <option value="{{$brand->id}}" selected >{{ $brand->name}}</option>
                                            @else
                                                <option value="{{$brand->id}}">{{ $brand->name}}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </li>
                            <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-search me-1"></i>
                                Search
                            </button>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5" style="padding-top: 0 !important;">
        </header>
                    
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    @if($products->count() > 0)

                        @foreach ($products as $product)

                            <!-- num ramdon para las estrellas de los productos -->
                            @php
                                $randomNumStar = rand(1, 5);
                                
                                // recortamos si es más grande de 10 (aprovechamos las 10 imgs para todos)

                                $img = strval($product->id);
                                if ($product->id>10) {
                                    $img = substr($img, -1);
                                }
                                $img .='.jpg';

                            @endphp

                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Etiqueta new aleatoriamente -->
                                    @if(rand(0, 1))
                                        <!-- Sale badge-->
                                        <div class="badge bg-success text-white position-absolute" style="top: 0.5rem; right: 0.5rem">new</div>
                                    @endif
                                    <!-- Product image-->
                                    <img class="card-img-top" src="{{URL::asset('/images/products/'.$img )}}" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h6 class="fw-bolder">{{ $product->name}}</h6>
                                            <h6 class="fst-italic bg-dark badge text-white">{{ $product->brand->name}}</h6>
                                            <!-- Product reviews-->
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                @for ($i = 0; $i < $randomNumStar; $i++)
                                                    <div class="bi-star-fill"></div>
                                                @endfor
                                            </div>
                                            <!-- Product price-->
                                             {{ $product->price }} €
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('products.show',$product->id) }}">Show</a></div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <p>No se han encontrado productos.</p>
                    @endif
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Carmishop 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
