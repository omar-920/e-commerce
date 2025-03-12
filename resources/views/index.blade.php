@extends('default.default')
<div class="header">
    <div class="container">

        @extends('default.nav')

        @section('nav')

        @endsection


        @section('content')
        @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        @endif
                <div class="row">
                    <div class="col-2">
                        <h1>Give Your Workout<br>A New Style!</h1>
                        <p>success isn't always about greatness.  It's about consistency
                            .   Consistent<br>hard work gains success.   Greatness will come.
                        </p>
                        <a href="products.html" class="btn">Explore Now &#8594;</a>
                    </div>
                    <div class="col-2">
                        <img src="{{asset('./images/image1.png')}}">
                    </div>
                </div>
            </div>
        </div>
<!-- featured categories.... -->

        <div class="categories">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset('./images/category-1.jpg')}}">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('./images/category-2.jpg')}}">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('./images/category-3.jpg')}}">
                    </div>
                </div>
            </div>
        </div>

<!-- featured products.... -->

        <div class="small-container">
            <h2 class="title">Latest Products</h2>
            <div class="row">
                @foreach ($latest_products as $product)
                    
                {{-- <div class="col-4">
                    <a href="./single-product.html">
                    <img src="{{asset('storage/' . $product->image)}}"></a>
                    <h4 class="f-bold">{{$product->name}}</h4>
                    <p>{{$product->price}}$</p>
                </div> --}}

                <div class="product-card">
                    <a href="{{route('products.single',$product->id)}}">
                        <img src="{{asset('storage/thumbnails/' . $product->thumbnail)}}" class="product-image">
                    </a>
                    <h4 class="product-name">{{ $product->name }}</h4>
                    <p class="product-price">{{ $product->price }}$</p>
                </div>
                
                @endforeach
            </div>
            {{-- <div class="row">
                <div class="col-4">
                    <a href="./single-product.html"><img src="./images/product-9.jpg"></a>                    <h4>Red Printed T-Shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-stroke"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-4">
                    <a href="./single-product.html"><img src="./images/product-10.jpg"></a>                    <h4>Red Printed T-Shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-stroke"></i>
                        <!-- <i class="fa fa-star-o"></i> -->
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-4">
                    <a href="./single-product.html"><img src="./images/product-11.jpg"></a>                    <h4>Red Printed T-Shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-stroke"></i>
                        <!-- <i class="fa fa-star-o"></i> -->
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-4">
                    <a href="./single-product.html"><img src="./images/product-12.jpg"></a>                    <h4>Red Printed T-Shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-stroke"></i>
                        <!-- <i class="fa fa-star-o"></i> -->
                    </div>
                    <p>$50.00</p>
                </div>
            </div> --}}
        </div>
<!------------------------------- Offer --------------------------->

        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="./images/exclusive.png" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exclusively Available on RedStore</p>
                        <h1>Smart Band 4</h1>
                        <small>
                            The Mi Smart Band 4 features a 39.9% larger(than Mi Band 3)
                            AMOLED color full-touch display with adjustable brightness, so 
                            everything is clear as can be.
                        </small>
                        <br>
                        <a href="products.html" class="btn">Buy Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- testimonial -->

        <div class="testimonial">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas illum, tempore sint maiores velit maxime omnis necessitatibus dolores repellat officia vero voluptas odit amet. Facere maxime perspiciatis commodi dignissimos nulla.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-stroke"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <img src="./images/user-1.png">
                        <h3>Sean Parker</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas illum, tempore sint maiores velit maxime omnis necessitatibus dolores repellat officia vero voluptas odit amet. Facere maxime perspiciatis commodi dignissimos nulla.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-stroke"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <img src="./images/user-2.png">
                        <h3>Miko Smith</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas illum, tempore sint maiores velit maxime omnis necessitatibus dolores repellat officia vero voluptas odit amet. Facere maxime perspiciatis commodi dignissimos nulla.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-stroke"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <img src="./images/user-3.png">
                        <h3>Mabel joe</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- brands -->

        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <img src="./images/logo-godrej.png">
                    </div>
                    <div class="col-5">
                        <img src="./images/logo-oppo.png">
                    </div>
                    <div class="col-5">
                        <img src="./images/logo-coca-cola.png">
                    </div>
                    <div class="col-5">
                        <img src="./images/logo-paypal.png">
                    </div>
                    <div class="col-5">
                        <img src="./images/logo-philips.png">
                    </div>
                </div>
            </div>
        </div>
    @endsection
