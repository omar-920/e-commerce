@extends('default.default')
<div class="header">
    <div class="container">

        @extends('default.nav')

        @section('nav')
        @endsection


        @section('content')
            <div class="small-container">
                <div class="row row-2">
                    <h2>All Products</h2>
                    <select name="" id="">
                        <option>Default Shorting</option>
                        <option>Short by Price</option>
                        <option>Short by popularity</option>
                        <option>Short by rating</option>
                        <option>Short by sale</option>
                    </select>
                </div>
                <div class="row">
                    {{-- <div class="sidebar">
                        <h2 style="margin-left: 15px ; color: black;">Categories</h2>
                        @foreach ($categories as $category)
                            <a href="#">{{ $category->name }}</a>
                        @endforeach
                    </div> --}}
                    @foreach ($products as $product)
                        <div class="product-card">
                            <a href="{{ route('products.single', $product->id) }}">
                                <img src="{{asset('storage/thumbnails/' . $product->thumbnail)}}" class="product-image">
                            </a>
                            <h4 class="product-name">{{ $product->name }}</h4>
                            <p class="product-price">{{ $product->price - $product->discount }} EGP </p>
                        </div>
                    @endforeach

                </div>
            </div>
            {{-- <form method="GET" action="" style="width: 50px; margin:25px">
                <select name="page" onchange="goToPage(this)">
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <option value="{{ $i }}" {{ request('page') == $i ? 'selected' : '' }}>
                            Page {{ $i }}
                        </option>
                    @endfor
                </select>
            </form> --}}

            <div class="pagination m-4">
                {{ $products->links() }}
            </div>
        @endsection
