<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title") | administration</title>
    @yield("css")
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="{{asset('script/header.js')}}" defer></script>
</head>
<body>
    <i class='bx bx-menu' id="menu-icon"></i>
    <x-app-layout>
    </x-app-layout>
    @php
        $route = request()->route()->getName();
    @endphp
    <div class="navbars">
        <div class="nav-items">
            <a href="{{route('admin.dashboard')}}" @class(['active' => $route == 'dashboard']) style="text-decoration:none;">
                 <span class="icons"><i class='bx bxs-home'></i></span>
                 <span class="text">Accueil</span>
            </a>
            <a href="{{route('admin.posts.index')}}" @class(['active' => str_contains($route, '.posts.')]) style="text-decoration:none;" href="/publications">
                 <span class="icons"><i class='bx bxs-map'></i></span>
                 <span class="text">Publications</span>
            </a>
            <a href="{{route('profile.edit')}}">
                 <span class="icons"><i class='bx bx-user-circle'></i></span>
                 <span class="text">Compte</span>
            </a>
            <a href="{{route('admin.users.index')}}" @class(['active' => str_contains($route, '.users.')]) style="text-decoration:none;" href="/users">
                 <span class="icons"><i class='bx bxs-user'></i></span>
                 <span class="text">Utilisateurs</span>
            </a>
        </div>
   </div>

   <div class="containers">
       @yield("containers")
   </div>

</body>
</html>
