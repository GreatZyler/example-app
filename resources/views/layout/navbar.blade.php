<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/etc.css'])
</head>
<body>

<nav class="navbar">
    <div class="container">
        <h1 class="logo">ChatApp</h1>
       
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Messages</a></li>
            <li><a href="{{route('friend-list')}}">Friends</a></li>
      <li> <form action="{{route('logout')}}" method="post" class="cs">@csrf <button type="submit" class="ko">Logout</button></form></li>
      
      
      <li class="pp"><span>{{auth()->user()->first_name[0] . auth()->user()->second_name[0]}}</span></li>
        </ul>
        <div class="search-container">
            <input type="text" placeholder="Search..." id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</nav>

@yield('content')