@extends('default.default')
<div class="header">
    <div class="container">

        @extends('default.nav')

        @section('nav')
        @endsection


        @section('content')
            <!-- ---------------------------single product details --------------------------- -->

            <div class="small-container single-product">
                <div class="row">
                    <div class="col-2">

                        <img src="{{ asset('storage/thumbnails/' . $item->thumbnail) }}" width="100%" id="ProductImg">

                        <div class="small-img-row">
                            <div class="small-img-col">
                                {{-- <img src="./images/gallery-1.jpg" width="100%" class="small-img"> --}}
                            </div>
                            <div class="small-img-col">
                                {{-- <img src="./images/gallery-2.jpg" width="100%" class="small-img"> --}}
                            </div>
                            <div class="small-img-col">
                                {{-- <img src="./images/gallery-3.jpg" width="100%" class="small-img"> --}}
                            </div>
                            <div class="small-img-col">
                                {{-- <img src="./images/gallery-4.jpg" width="100%" class="small-img"> --}}
                            </div>
                        </div>

                    </div>
                    <div class="col-2">

                        <p>Home / {{ $item->category->name }}</p>
                        @if (session('error'))
                            <div
                                style="color: red; padding: 10px; background-color: #ffdddd; border: 1px solid red; margin-bottom: 10px;">
                                {{ session('error') }}
                            </div>
                        @endif


                        <h1>{{ $item->name }}</h1>

                        @if ($item->discount != 0)
                            <h5 style="color: red; text-decoration: line-through;">From <span>{{ $item->price }}</span>
                            </h5>
                            <h4> To <span style="color: green;">{{ $item->price - $item->discount }}</span></h4>
                        @else
                            <h4>EGP {{ $item->price - $item->discount }}</h4>
                        @endif



                        <form action="{{ route('addToCart', $item->id) }}" method="post">
                            @csrf
                            <input type="number" value="1" name="quantity">
                            <button type="submit" class="btn">Add To Cart</button>
                        </form>
                        <h3>Product Details <i class="fa fa-table"></i></h3>
                        <br>
                        <p>{{ $item->details }}</p>
                    </div>
                </div>
            </div>


            <!-- title -->
            <div class="small-container">
                <div class="row row-2">
                    <h2>Latest Products</h2>
                    <a href="{{ route('viewProduct') }}">View More</a>
                </div>
            </div>


            <!-- product details section start here-->
            <div class="small-container">

                <div class="row">
                    @foreach ($latest as $late)
                        <div class="col-4">
                            <a href="{{ route('products.single', $late->id) }}"><img
                                    src="{{ asset('storage/thumbnails/' . $late->thumbnail) }}"></a>
                            <h4>{{ $late->name }}</h4>
                            <p>{{ $late->price - $late->discount }}</p>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="page-btn">
                <a href=""><span>1</span></a>
                <a href=""> <span>2</span></a>
                <a href=""><span>3</span></a>
                <a href=""><span>4</span></a>
                <a href=""><span>&#8594;</span></a>
            </div> --}}
            </div>
        @endsection
