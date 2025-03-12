@extends('default.default')
<div class="header">
    <div class="container">

        @extends('default.nav')

        @section('nav')

        @endsection


        @section('content')
            <!-- cart item details -->
            <div class="small-container cart-page">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>subtotal</th>
                    </tr>
                    @foreach ($cartItems as $item)
                        
                    
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="{{ asset('storage/thumbnails/' . $item->product->thumbnail) }}" >
                                <div>
                                    <p>{{$item->product->name}}</p>
                                    <small>Price: {{$item->product->price - $item->product->discount}} $</small>
                                    <form action="{{route('cart.delete',$item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" value="{{$item->quantity}}" disabled></td>
                        <td>EGP {{($item->product->price - $item->product->discount)*$item->quantity}}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="total-price">
                    <table>
                        <tr>
                            <td>
                                Total
                            </td>
                            <td>
                              EGP {{ number_format($totalPrice, 2) }}
                            </td>
                            <td>
                                    <form action="{{route('sendToWhatsApp')}}" method="get">
                                        <button class="btn" type="submit">Order Now !!</button>
                                    </form>
                            </td>
                        </tr>
                        
                    </table>
                    
                </div>
            </div>

    
        <!-- footer -->
@endsection