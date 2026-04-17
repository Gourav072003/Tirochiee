<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TIROCHIEE</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@0.1.2/css/themify-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&display=swap" rel="stylesheet">

<style>
/* RESET */
*{ margin:0; padding:0; box-sizing:border-box; }
body{ font-family: Arial, sans-serif; }

/* HEADER - Slim & Transparent */
.header{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    padding :5px;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    z-index:1000;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

body{
    padding-top: 92px;
}

.header-main{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding: 5px 20px; 
    position:relative;
    min-height: 72px;
}

.left-section{
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    height:100%;
    position:relative;
    z-index:2;
}

.center-brand{
    position:absolute;
    left:50%;
    top:50%;
    transform:translate(-50%,-50%);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:2px;
    text-align:center;
}

.center-brand-logo{
    display:flex;
    align-items:center;
    justify-content:center;
    height:34px;
}

.center-brand-logo img{
    height:34px;
    width:auto;
    object-fit:contain;
    display:block;
}

/* DEEP GREEN THEME */
#menuToggle, .brand-name, .brand-tagline, .icon-badge, .user-menu a, .sidebar ul li a, .sidebar-section-title {
    color: #154734 !important;
}

#menuToggle {
    width:40px;
    height:40px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    border:none;
    background:none;
    cursor:pointer;
    padding:0;
    line-height:1;
    background: transparent !important;
    box-shadow: none !important;
}

.logo a{
    display:flex;
    align-items:center;
    justify-content:center;
    transform: translateY(-18px);
    width:52px;
    height:52px;
    padding:0;
    border:2px solid rgba(21, 71, 52, 0.28);
    border-radius:50%;
    background:linear-gradient(180deg, #ffffff 0%, #f4f8f5 100%);
    box-shadow:0 8px 16px rgba(21, 71, 52, 0.10);
}

.logo img {
    height: 30px;
    width: auto;
    display: block;
    object-fit: contain;
    vertical-align: middle;
    position: static;
    transform: translateY(-1px);
}

.logo{
    display:flex;
    align-items:flex-start;
    justify-content:center;
}

.brand-name {
    font-family: 'Cinzel', serif;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: 3px;
    margin:0;
    line-height:1;
}

.brand-divider{
    width:38px;
    height:2px;
    background:#154734;
    opacity:0.45;
}

.brand-tagline{
    font-size:9px;
    letter-spacing:1.6px;
    transform: translateY(3px);
    text-transform:uppercase;
    line-height:1;
}

.right-section {
    display:flex;
    align-items:center;
    gap:10px;
    position:relative;
    z-index:2;
}

/* SEARCH BOX */
.compact-search{
    position:relative;
}

.compact-search form {
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:8px;
}

.compact-search input {
    width:0;
    opacity:0;
    pointer-events:none;
    height:40px;
    border:1px solid #154734;
    border-radius:999px;
    padding:0;
    outline:none;
    background:#fff;
    color:#154734;
    transition:width 0.25s ease, opacity 0.2s ease, padding 0.2s ease;
}

.compact-search.is-open input{
    width:220px;
    opacity:1;
    pointer-events:auto;
    padding:0 14px;
}

.compact-search button {
    width:40px;
    height:40px;
    border:1px solid #154734;
    background:#fff;
    color:#154734;
    border-radius:50%;
    padding:0;
    cursor:pointer;
}

/* BADGES */
.icon-badge { position:relative; font-size:18px; text-decoration:none; }
.total-count {
    position:absolute;
    top:-6px;
    right:-8px;
    min-width:16px;
    height:16px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    background:red;
    color:#fff;
    font-size:9px;
    line-height:1;
    padding:0 4px;
    border-radius:999px;
}

.total-count.is-empty {
    display:none;
}

/* USER MENU - Logic for Admin */
.user-menu { display: none; }
.user-menu a { text-decoration:none; font-size:13px; font-weight:600; }

/* SIDEBAR */
.sidebar {
    position:fixed; top:0; right:-320px; left:auto; width:320px; max-width:88vw; height:100vh;
    background:#fff; box-shadow:2px 0 10px rgba(0,0,0,0.1);
    transition:0.3s; padding-top:24px; z-index:2000;
    overflow-y:auto;
    -webkit-overflow-scrolling:touch;
}
.sidebar.active { right:0; }
.sidebar-inner{ padding: 0 22px 24px; }
.sidebar-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:18px;
}
.sidebar-close{
    width:36px;
    height:36px;
    border:none;
    background:none;
    font-size:20px;
    color:#154734;
    cursor:pointer;
}
.sidebar-section-title{
    font-size:12px;
    font-weight:700;
    letter-spacing:1.4px;
    text-transform:uppercase;
    margin:18px 0 10px;
}
.sidebar ul { list-style:none; }
.sidebar ul li { padding:15px 0; border-bottom: 1px solid #eee; }
.sidebar ul li:hover { background: #f0f7f0; }

.sidebar ul li a{
    display:flex;
    align-items:center;
    justify-content:space-between;
    text-decoration:none;
    font-weight:600;
}

.sidebar-social{
    display:flex;
    align-items:center;
    gap:12px;
    margin-top:18px;
}

.sidebar-social a{
    width:38px;
    height:38px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    border:1px solid rgba(0, 75, 0, 0.18);
    border-radius:50%;
    text-decoration:none;
    color:#154734;
    background:#f7faf8;
    transition:background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
}

.sidebar-social a:hover{
    background:#154734;
    color:#fff;
    border-color:#154734;
}

@media(max-width:768px){
    body{
        padding-top: 84px;
    }

    .header-main {
        padding: 8px 12px;
        min-height: 68px;
    }
    .brand-name { font-size: 18px; letter-spacing: 2px; }
    .brand-tagline { font-size:8px; letter-spacing:1px; }
    .brand-divider{ width:28px; }
    .center-brand-logo,
    .center-brand-logo img{ height:26px; }
    .logo a {
        width:44px;
        height:44px;
    }
    .logo img {
        height:26px;
        transform: translateY(-1px);
    }
    .sidebar{ width:280px; }
}

@media(max-width:576px){
    .header{
        padding: 0;
    }

    body{
        padding-top: 82px;
    }

    .header-main{
        padding: 10px 10px 8px;
        min-height: 82px;
    }

    .left-section,
    .right-section{
        width: 52px;
        min-width: 52px;
    }

    .left-section{
        justify-content: flex-start;
    }

    .right-section{
        justify-content: flex-end;
        gap: 6px;
    }

    .logo a{
        width: 40px;
        height: 40px;
    }

    .logo img{
        height: 22px;
        transform: translateY(-1px);
    }

    .center-brand{
        width: calc(100% - 128px);
        max-width: 230px;
        gap: 3px;
    }

    .center-brand-logo{
        height: 22px;
    }

    .center-brand-logo img{
        height: 22px;
    }

    .brand-name{
        font-size: 14px;
        letter-spacing: 1.6px;
    }

    .brand-divider{
        width: 22px;
        height: 1px;
    }

    .brand-tagline{
        font-size: 7px;
        letter-spacing: 0.9px;
    }

    .compact-search button,
    #menuToggle{
        width: 36px;
        height: 36px;
        font-size: 16px;
    }

    .sidebar{
        width: 100%;
        max-width: 100%;
        right: -100%;
    }

    .sidebar-inner{
        padding: 0 18px 24px;
    }

    .sidebar ul li{
        padding: 13px 0;
    }

    .sidebar ul li a{
        font-size: 15px;
    }

    .sidebar-social{
        flex-wrap: wrap;
        gap: 10px;
    }

    .compact-search.is-open input{
        width: 150px;
    }
}
</style>
</head>

<body>

@php
    $wishlistCount = Helper::wishlistCount();
    $cartCount = Helper::cartCount();
@endphp

<header class="header">
    <div class="header-main">
        <div class="left-section">
            <div class="logo">
                @php $settings=DB::table('settings')->get(); @endphp
                <a href="{{route('home')}}">
                    <img src="@foreach($settings as $data) {{$data->logo}} @endforeach">
                </a>
            </div>
        </div>

        <div class="center-brand">
            <div class="center-brand-logo">
                <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="Tirochiee logo">
            </div>
            <h2 class="brand-name">TIROCHIEE</h2>
            <span class="brand-divider"></span>
            <p class="brand-tagline">Crafted For Queen</p>
        </div>

        <div class="right-section">
            <div class="compact-search">
                <form method="POST" action="{{route('product.search')}}">
                    @csrf
                    <input name="search" placeholder="Search..." type="search">
                    <button type="submit"><i class="ti-search"></i></button>
                </form>
            </div>
            <button id="menuToggle"><i class="fa fa-bars"></i></button>
        </div>
    </div>
</header>

<div id="sidebar" class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-header">
            <strong class="sidebar-section-title" style="margin:0;">Menu</strong>
            <button id="sidebarClose" class="sidebar-close" type="button"><i class="fa fa-times"></i></button>
        </div>

        <div class="sidebar-section-title">Account</div>
        <ul>
            @auth
                <li><a href="{{route('order.track')}}">Track Order</a></li>
                <li><a href="{{route('wishlist')}}">Wishlist <span class="total-count {{ $wishlistCount > 0 ? '' : 'is-empty' }}">{{ $wishlistCount }}</span></a></li>
                <li><a href="{{route('cart')}}">Cart <span class="total-count {{ $cartCount > 0 ? '' : 'is-empty' }}">{{ $cartCount }}</span></a></li>
                @if(Auth::user()->role == 'admin')
                    <li><a href="{{route('admin')}}">Admin Panel</a></li>
                @else
                    <li><a href="{{route('user')}}">Dashboard</a></li>
                @endif
                <li><a href="{{route('user.logout')}}">Logout</a></li>
            @else
                <li><a href="{{route('order.track')}}">Track Order</a></li>
                <li><a href="{{route('wishlist')}}">Wishlist <span class="total-count {{ $wishlistCount > 0 ? '' : 'is-empty' }}">{{ $wishlistCount }}</span></a></li>
                <li><a href="{{route('cart')}}">Cart <span class="total-count {{ $cartCount > 0 ? '' : 'is-empty' }}">{{ $cartCount }}</span></a></li>
                <li><a href="{{route('login.form')}}">Login</a></li>
                <li><a href="{{route('register.form')}}">Register</a></li>
            @endauth
        </ul>

        <div class="sidebar-section-title">Browse</div>
        <ul>
            <li><a href="#">Women&apos;s Fashion</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Footwear</a></li>
            <li><a href="{{route('product-grids')}}">All Products</a></li>
            <li><a href="{{route('about-us')}}">About Us</a></li>
            <li><a href="{{route('contact')}}">Contact Us</a></li>
        </ul>

        <div class="sidebar-section-title">Follow Us</div>
        <div class="sidebar-social">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>

<script>
    const menuBtn = document.getElementById("menuToggle");
    const sidebar = document.getElementById("sidebar");
    const sidebarClose = document.getElementById("sidebarClose");
    const searchWrap = document.querySelector(".compact-search");
    const searchForm = searchWrap ? searchWrap.querySelector("form") : null;
    const searchInput = searchWrap ? searchWrap.querySelector("input[name='search']") : null;
    const searchButton = searchWrap ? searchWrap.querySelector("button[type='submit']") : null;

    if (searchForm && searchInput && searchButton) {
        searchForm.addEventListener("submit", function (e) {
            if (!searchWrap.classList.contains("is-open")) {
                e.preventDefault();
                searchWrap.classList.add("is-open");
                searchInput.focus();
                return;
            }

            if (!searchInput.value.trim()) {
                e.preventDefault();
                searchInput.focus();
            }
        });

        searchInput.addEventListener("blur", function () {
            if (!searchInput.value.trim()) {
                searchWrap.classList.remove("is-open");
            }
        });
    }

    menuBtn.onclick = function (e) {
        e.stopPropagation();
        sidebar.classList.toggle("active");
    };

    if (sidebarClose) {
        sidebarClose.onclick = function () {
            sidebar.classList.remove("active");
        };
    }

    document.onclick = function (e) {
        if (!sidebar.contains(e.target) && !menuBtn.contains(e.target)) {
            sidebar.classList.remove("active");
        }

        if (searchWrap && !searchWrap.contains(e.target) && searchInput && !searchInput.value.trim()) {
            searchWrap.classList.remove("is-open");
        }
    };
</script>
</body>
</html>


<!-- git init
git add .
git commit -m "Initial Laravel project"
git branch -M main
git remote add origin https://github.com/Gourav072003/Tirochiee.git
git push -u origin main

git init

git add .

git commit -m "Initial commit"

git branch -M main

git remote remove origin
git remote add origin https://github.com/Gourav072003/Tirochiee.git

git push -u origin main
git status
git add .
git commit -m "Initial commit"
git branch -M main
git push -u origin main



git add resources/views/frontend/layouts/header.blade.php
git commit -m "Fix header layout"
git branch -M main
git push -u origin main

 -->
