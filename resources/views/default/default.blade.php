<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>E-commerce</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="./style.css"> --}}
        @vite('resources/css/style.css')
        @vite('resources/css/all.min.css')
        @vite('resources/js/all.min.js')
        {{-- <link rel="stylesheet" href="./font/css/all.min.css"> --}}
        {{-- <script src="font/js/all.min.js"></script> --}}
       
    </head>
    <body>




        @yield('content')


        
        <!-- footer -->
    </div>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Download Our App</h3>
                        <p>Download Our App For Android And ios Mobile Phone</p>
                        <div class="app-logo">
                            <a href=""><img src="./images/play-store.png" alt=""></a>
                            <a href=""><img src="./images/app-store.png" alt=""></a>
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <img src="./images/logo-white.png">
                        <p>Our Purpose Is To Sustainably Make the Pleasre and Benefits
                            of Sports Accessible to the Many
                        </p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="">Coupons</a></li>
                            <li><a href="">Blog Post</a></li>
                            <li><a href="">Return Policy</a></li>
                            <li><a href="">Join Affiliate</a></li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Instgram</a></li>
                            <li><a href="">YouTube</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="copyright">Copyright 2023 - Omar Tarek</p>
            </div>
        </div>

        <!-- JS FOR TOGGLE MENU.... -->

        <script>
           var MenuItems = document.getElementById("MenuItems");
           MenuItems.style.maxHeight = "0px";
           function menutoggle(){
            if(MenuItems.style.maxHeight == "0px"){
                MenuItems.style.maxHeight = "200px";
            }else{
                MenuItems.style.maxHeight = "0px";
            }
           }
        </script>
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var indicator = document.getElementById("indicator");

    function register(){
        RegForm.style.transform = "translateX(0px)"
        LoginForm.style.transform = "translateX(0px)"
        indicator.style.transform = "translateX(100px)"
    }
    function login(){
        RegForm.style.transform = "translateX(300px)"
        LoginForm.style.transform = "translateX(300px)"
        indicator.style.transform = "translateX(0px)"
    }

</script>



    </body>
</html>