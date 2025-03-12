<div class="navbar">
    <div class="logo">
        <a href="index.html"><img src="{{ asset('./images/logo.png') }}" width="125px"></a>
    </div>
    <!-- Navigation links -->
    <nav>
        <ul id="MenuItems">
            <li><a href="{{ route('viewIndex') }}">Home</a></li>
            <li><a href="{{ route('viewProduct') }}">Products</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="{{ route('login') }}">Account</a></li>
            @if (Auth::check())
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn" type="submit">logout</button>
                    </form>
                </li>
            @endif
            @if (Auth::check() )
            @if (Auth::user()->role == 'admin'||Auth::user()->role == 'auther')
                <li><a href="{{route('dashboard')}}" class="btn">Admin Dashboard</a></li>
            @endif
            @endif

            <a href="{{ route('getCart') }}" class=""><img src="{{ asset('./images/cart.png') }}" width="30px"
                    height="30px"></a>
        </ul>
    </nav>
    <img src="{{ asset('./images/menu.png') }}" class="menu-icon" onclick="menutoggle()">
</div>
@yield('nav')
