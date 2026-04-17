<!-- Meta Tag -->
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- Web Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<style>
    :root {
        --theme-green: #154734;
        --theme-green-dark: #0f3627;
        --theme-green-soft: #d7e1dc;
        --theme-grey: #5f6b66;
        --theme-grey-dark: #2f3633;
        --theme-grey-light: #eef2ef;
        --theme-white: #ffffff;
    }

    /* Multilevel dropdown */
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>a:after {
        content: "\f0da";
        float: right;
        border: none;
        font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: 0px;
        margin-left: 0px;
    }

    body {
        color: var(--theme-grey-dark);
        background: var(--theme-white);
    }

    a,
    .section-title h2,
    .shop-section-title h1,
    .shop-section-title h2,
    .product-content h3 a,
    .single-banner .content h3,
    .blog-single .content h2 a,
    .shop-services .single-service i,
    .footer .single-footer h4,
    .header.shop .nav li a,
    .topbar .single-contact i,
    .topbar .single-contact a,
    .topbar .right-content ul li a,
    .search-bar-top .search-bar a,
    .search-bar-top .search-bar input,
    .shopping-item .dropdown-cart-header span,
    .shopping-item .bottom .total span,
    .nice-select .current,
    .shop .nice-select .list li,
    .product-des .short h4,
    .cart-single-list .content h4 a,
    .checkout-form h2,
    .login-form h2,
    .register-form h2 {
        color: var(--theme-green);
    }

    a:hover,
    .product-content h3 a:hover,
    .blog-single .content h2 a:hover,
    .header.shop .nav li a:hover,
    .header.shop .nav li.active a,
    .header.shop .nav li .dropdown li:hover a,
    .header.shop .nav li .dropdown li.active a,
    .shopping-item .bottom .btn:hover,
    .single-product .product-content .product-price span,
    .single-product .product-img .button-head .product-action a:hover,
    .single-product .product-img .button-head .product-action-2 a:hover,
    .product-des .total-review:hover,
    .product-des .rating li i,
    .shop.single section.shop.checkout .nice-select ul.list li.option.selected,
    .shop.single section.shop.checkout .nice-select ul.list li.option:hover,
    .footer .copyright .copyright-content p a:hover {
        color: var(--theme-green-dark) !important;
    }

    .button .btn,
    .btn,
    button,
    .single-product .product-img .button-head .product-action-2 a,
    .shopping-item .bottom .btn,
    .shop .checkout .button5 .btn,
    .shop.login .login-form .btn,
    .shop.login .register-form .btn,
    .shop.single .add-to-cart .btn,
    .newsletter .btn,
    .section-title a,
    .search-bar-top .search-bar .btnn,
    .search-top .search-form button,
    .search-bar input + button,
    input[type="submit"],
    button[type="submit"] {
        background: var(--theme-green) !important;
        border-color: var(--theme-green) !important;
        color: var(--theme-white) !important;
    }

    .button .btn:hover,
    .btn:hover,
    button:hover,
    .single-product .product-img .button-head .product-action-2 a:hover,
    .shopping-item .bottom .btn:hover,
    .shop .checkout .button5 .btn:hover,
    .shop.login .login-form .btn:hover,
    .shop.login .register-form .btn:hover,
    .shop.single .add-to-cart .btn:hover,
    .newsletter .btn:hover,
    input[type="submit"]:hover,
    button[type="submit"]:hover {
        background: var(--theme-green-dark) !important;
        border-color: var(--theme-green-dark) !important;
        color: var(--theme-white) !important;
    }

    .header.shop .nav li .dropdown,
    .shopping-item,
    .product-area .single-product,
    .small-banner .single-banner,
    .midium-banner .single-banner,
    .shop-services.section,
    .single-footer,
    .shop.single .product-des,
    .shop.single .tab-content .tab-pane,
    .cart-information,
    .order-details,
    .checkout-form,
    .login-form,
    .register-form,
    .single-widget,
    .blog-single,
    .comment-list .single-comment,
    .shop-sidebar .single-widget,
    .table.shopping-summery {
        border-color: var(--theme-green-soft) !important;
        box-shadow: 0 10px 30px rgba(15, 81, 50, 0.06);
    }

    .header.shop,
    .topbar,
    .footer,
    .shop-services.section,
    .cown-down,
    .shop-newsletter,
    .breadcrumbs {
        background: var(--theme-grey-light);
    }

    .header.shop .middle-inner,
    .header.shop .topbar,
    .footer .footer-top,
    .footer .copyright {
        border-color: rgba(15, 81, 50, 0.14);
    }

    .section-title h2:before,
    .section-title h2:after,
    .pagination .pagination-list li.active a,
    .pagination .pagination-list li:hover a,
    .single-product .product-img .new,
    .single-product .product-img .price-dec,
    .single-product .product-img .sale-tag,
    .single-product .product-img .button-head .product-action a span,
    .shop.single .product-des .size ul li a:hover,
    .shop.single .product-des .size ul li.active a,
    .shop.single .product-des .color ul li a:hover,
    .shop.single .product-des .color ul li.active a,
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active,
    .list-group .list-group-item.active,
    .badge-primary,
    .badge-success,
    .badge-info {
        background: var(--theme-green) !important;
        border-color: var(--theme-green) !important;
        color: var(--theme-white) !important;
    }

    .header.shop .nav li .dropdown li a,
    p,
    span,
    .product-des p,
    .single-product .product-content .product-price,
    .shop-sidebar .single-widget .title,
    .footer .single-footer p,
    .footer .single-footer li a,
    .footer .copyright .copyright-content p,
    .breadcrumbs ul li,
    .breadcrumbs ul li a,
    .shop.single .review .review-inner .ratings li,
    .checkout-form label,
    .login-form label,
    .register-form label {
        color: var(--theme-grey);
    }

    .header.shop .search-bar,
    .header.shop .search-bar-top,
    .nice-select,
    input,
    textarea,
    select,
    .form-control,
    .search-bar input {
        border-color: rgba(15, 81, 50, 0.24) !important;
    }

    input:focus,
    textarea:focus,
    select:focus,
    .form-control:focus,
    .nice-select:focus,
    .search-bar input:focus {
        border-color: var(--theme-green) !important;
        box-shadow: 0 0 0 0.2rem rgba(15, 81, 50, 0.12) !important;
    }

    ::selection {
        background: var(--theme-green);
        color: var(--theme-white);
    }

    .footer,
    .footer .footer-top,
    .footer .copyright,
    .footer .single-footer,
    .footer .single-footer.about,
    .footer .single-footer.links,
    .footer .single-footer.social {
        background: #dde3df !important;
        box-shadow: none !important;
    }

    .footer .single-footer h4,
    .footer .single-footer p,
    .footer .single-footer li,
    .footer .single-footer li a,
    .footer .contact ul li,
    .footer .copyright .copyright-content p,
    .footer .copyright p {
        color: var(--theme-grey-dark) !important;
        text-shadow: none !important;
    }

    .footer .single-footer li a:hover,
    .footer .copyright a:hover {
        color: var(--theme-green) !important;
    }

    .footer .about .call,
    .footer .about .call a,
    .footer .single-footer .logo a,
    .footer .single-footer .logo img {
        color: var(--theme-green) !important;
    }

    @media (max-width: 991px) {
        .section {
            padding: 54px 0;
        }

        .section-title h2,
        .shop-section-title h1,
        .shop-section-title h2 {
            font-size: 30px;
        }
    }

    @media (max-width: 767px) {
        .section {
            padding: 42px 0;
        }

        .breadcrumbs {
            padding: 12px 0;
        }

        .section-title {
            margin-bottom: 28px;
        }

        .section-title h2,
        .shop-section-title h1,
        .shop-section-title h2 {
            font-size: 26px;
            line-height: 1.2;
        }

        .button .btn,
        .btn,
        button,
        input[type="submit"],
        button[type="submit"] {
            min-height: 46px;
        }

        .single-product .product-content h3 a,
        .blog-single .content h2 a {
            line-height: 1.45;
        }
    }

    @media (max-width: 576px) {
        body {
            font-size: 14px;
        }

        .section {
            padding: 34px 0;
        }

        .container {
            padding-left: 16px;
            padding-right: 16px;
        }

        .section-title {
            margin-bottom: 22px;
        }

        .section-title h2,
        .shop-section-title h1,
        .shop-section-title h2 {
            font-size: 22px;
        }

        .breadcrumbs ul li,
        .breadcrumbs ul li a,
        p,
        span {
            line-height: 1.65;
        }

        .single-product,
        .single-banner,
        .single-widget,
        .blog-single,
        .checkout-form,
        .login-form,
        .register-form,
        .cart-information,
        .order-details {
            border-radius: 16px;
        }
    }
</style>
@stack('styles')
