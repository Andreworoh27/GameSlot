<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('css/navbarStyle.css') }}" />
</head>

<body>
    <nav>
        <div class="navbar-brand">
            <a href="/" style="text-decoration: none">
                <h3 style="color: black">Game<span style="color: red">Slot</span></h3>
            </a>
        </div>
        <div class="navbar-content">
            @auth
                @if (Auth::user()->role == 'Admin')
                    <div class="navbar-menu-container">
                        <a href="/managegame" class="navbar-menu admin-menu">Manage Game</a>
                        <a href="/gamegenre" class="navbar-menu admin-menu">Manage Game Genre</a>
                    </div>
                @endif
            @endauth
            <form class="searchbox d-flex" role="search" method="GET" action="/search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @auth
                <div class="navbar-menu-container">
                    <a href="/cart" class="navbar-menu sign">Cart</a>
                    <div class="dropdown">
                        {{-- {{dd(Storage::url('Profile Image/' . Auth::user()->image))}} --}}
                        <img class="profilepic" src="{{ Storage::url('Profile Image/' . Auth::user()->image) }}">
                        <div class="dropdown-menu">
                            <b>Hi, {{ auth()->user()->name }}</b>
                            <hr class="solidmenu">
                            <a href="/profile">Your Profile</a>
                            <a href="/transactionhistory">Transaction History</a>
                            <a href="/logout">Log Out</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="navbar-menu-container">
                    <a href="/signUp" class="navbar-menu sign">Sign Up</a>
                    <a href="/signIn" class="navbar-menu sign">Sign In</a>
                </div>
            @endauth
        </div>
    </nav>
    @yield('content')
</body>

</html>
