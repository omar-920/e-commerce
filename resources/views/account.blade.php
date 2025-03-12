@extends('default.default')
<div class="header">
    <div class="container">

        @extends('default.nav')

        @section('nav')
        @endsection


        @section('content')
            <!-- account-page -->

            <div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="./images/image1.png" width="100%">
                        </div>
                        <div class="col-2">
                            @if ($errors->any())
                                <div style="color: red;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-container">
                                <div class="form-btn">
                                    <span onclick="login()">Login</span>
                                    <span onclick="register()">Register</span>
                                    <hr id="indicator">
                                </div>
                                {{-- login Form --}}
                                <form action="{{ route('loginAction') }}" method="post" id="LoginForm">
                                    @csrf
                                    <input type="text" name="email" placeholder="Please Enter Your Email">
                                    <input type="password" name="password" placeholder="password">
                                    <button type="submit" class="btn">Login</button>
                                </form>
                                {{-- Register Form --}}
                                <form action="{{ route('register') }}" method="post" id="RegForm">
                                    @csrf
                                    <input type="text" name="name" placeholder="Please Enter Your Name ">
                                    <input type="email" name="email" placeholder="email">
                                    <input type="password" name="password" placeholder="password">
                                    <input type="password" name="password_confirmation" placeholder="Repeat password">
                                    <button type="submit" class="btn">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->
        @endsection
