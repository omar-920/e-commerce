
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title', 'Dashboard')</title>

<!-- ================= Favicon ================== -->
<!-- Standard -->
<link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
<!-- Retina iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
<!-- Retina iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
<!-- Standard iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
<!-- Standard iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Styles -->
<link href="{{asset('dashboard-assets/assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard-assets/assets/css/lib/themify-icons.css')}}" rel="stylesheet">
<link href="{{asset('dashboard-assets/assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
<link href="{{asset('dashboard-assets/assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">

<link href="{{asset('dashboard-assets/assets/css/lib/helper.css')}}" rel="stylesheet">
<link href="{{asset('dashboard-assets/assets/css/style.css')}}" rel="stylesheet">
<style>
    .custom-img-container {
    width: 100%; /* العرض كامل */
    height: 150px; /* الطول يتحكم فيه */
    overflow: hidden; 
}

.custom-img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* يجعل الصورة تملأ الديف بدون تشويه */
}
</style>