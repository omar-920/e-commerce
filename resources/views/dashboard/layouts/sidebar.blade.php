<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a
                    href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a>
            </div>
            <ul>
                <li class="label">Main</li>
                <li class="active"><a class="d-flex justify-between align-items-center" href="{{ route('dashboard') }}"><i class="ti-home"></i> Dashboard 
                            {{-- <span class="badge badge-primary">2</span>  --}}
                            </a>
                    <ul>
                    </ul>
                </li>

                <li class="label">Apps</li>

                <ul>
                    @if (Auth::user()->role == 'auther')
                    <li class="d-flex justify-between align-items-center"><a href="{{route('viewAdmins')}}" class="w-100"><i class="fa-solid fa-user-tie f-s-20"></i>Admins</a></li>
                    @endif
                    <li class="d-flex justify-between align-items-center"><a href="{{route('viewUsers')}}" class="w-100"><i class="fa-solid fa-user f-s-20"></i>Users</a></li>
                    <li class="d-flex justify-between align-items-center"><a href="{{route('cat.view')}}" class="w-100"><i class="fa-solid fa-list f-s-20"></i>Categories</a></li>
                    <li class="d-flex justify-between align-items-center"><a href="{{route('product.view')}}" class="w-100"><i class="fa-solid fa-table f-s-20"></i>Products</a></li>

                </ul>

                {{-- <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Manage Admins <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-reset-password.html">Forgot password</a></li>
                    </ul>
                </li> --}}
                <form id="myForm" action="{{route('logout')}}" method="post">
                    @csrf
                <li><a href="#" type="submit" onclick="document.getElementById('myForm').submit(); return false;"><i class="ti-close"></i> Logout</a></li>
                </form>
            </ul>
        </div>
    </div>
</div>
