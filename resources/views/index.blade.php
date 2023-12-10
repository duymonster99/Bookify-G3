<!DOCTYPE html>
<html lang="en">

<head>
    <title>Testing - Mobillio Online Store</title>
    <meta property="og:title" content="Testing - Mobillio Online Store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    {{-- css bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <style data-tag="reset-style-sheet">
        html {
            line-height: 1.15;
        }

        body {
            margin: 0;
        }

        * {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
        }

        p,
        li,
        ul,
        pre,
        div,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        figure,
        blockquote,
        figcaption {
            margin: 0;
            padding: 0;
        }

        button {
            background-color: transparent;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }

        button,
        select {

            text-transform: none;}button,[type="button"],
            [type="reset"],
            [type="submit"] {

                -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,
                [type="reset"]::-moz-focus-inner,
                [type="submit"]::-moz-focus-inner {
                    border-style: none;

                    padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,
                    [type="reset"]:-moz-focus,
                    [type="submit"]:-moz-focus {
                        outline: 1px dotted ButtonText;
                    }

                    a {
                        color: inherit;
                        text-decoration: inherit;
                    }

                    input {
                        padding: 2px 4px;
                    }

                    img {
                        display: block;
                    }

                    html {
                        scroll-behavior: smooth
                    }
    </style>
    <style data-tag="default-style-sheet">
        html {
            font-family: Jost;
            font-size: 16px;
        }

        body {
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            text-transform: none;
            letter-spacing: 0.02;
            line-height: 1.55;
            color: var(--dl-color-gray-black);
            background-color: var(--dl-color-gray-white);

        }
    </style>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton:wght@400&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font" />
</head>

<body>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <div>
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" />

        <div class="index-container">
            {{--
                =======================================
                HEADER
                =======================================
            --}}
            <header class="p-3 text-bg-light">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/"
                            class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                                <use xlink:href="#bootstrap" />
                            </svg>
                        </a>

                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="{{ route('index') }}" class="nav-link px-2 text-dark">Home</a></li>
                            <li><a href="{{ route('client.products.index') }}"
                                    class="nav-link px-2 text-dark">Products</a></li>
                            <li><a href="#" class="nav-link px-2 text-dark">Pricing</a></li>
                            <li><a href="#" class="nav-link px-2 text-dark">FAQs</a></li>
                            <li><a href="#" class="nav-link px-2 text-dark">About</a></li>
                        </ul>

                        <form action="" method="POST" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"
                            role="search">
                            @csrf
                            <input type="search" class="form-control form-control-dark text-bg-light"
                                placeholder="Search..." aria-label="Search">
                        </form>

                        <a href="{{ route('showCart') }}"
                            class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none"
                            style="font-size: 20px; margin-right: 10px">
                            <i class="bi bi-cart"></i>
                        </a>

                        @if (session('userInfo'))
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="" width="32"
                                        height="32" class="rounded-circle me-2">
                                    <strong>{{ session('userInfo')['email'] }}</strong>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                    <li><a class="dropdown-item" href="#">New project...</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('user.logout') }}">Sign out</a></li>
                                </ul>
                            </div>
                        @else
                            <div class="text-end">
                                <a href="{{ route('login.form') }}"><button type="button"
                                        class="btn btn-outline-dark me-2">Login</button></a>
                                <a href="{{ route('sign_up') }}"><button type="button"
                                        class="btn btn-warning">Sign-up</button></a>
                            </div>
                        @endif
                    </div>
                </div>
            </header>
            {{--
                ====================================
                END HEADER
                ====================================
            --}}

            {{--
                ====================================
                CONTENT
                ====================================
            --}}
            <div class="container-fluid">
                @yield('content')
            </div>

            {{--
                ====================================
                FOOTER
                ====================================
            --}}
            <div class="container">
                <footer class="py-5">
                    <div class="row">
                        <div class="col-6 col-md-2 mb-3">
                            <h5>Section</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">Features</a></li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">Pricing</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-6 col-md-2 mb-3">
                            <h5>Section</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">Features</a></li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">Pricing</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-6 col-md-2 mb-3">
                            <h5>Section</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">Features</a></li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">Pricing</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-5 offset-md-1 mb-3">
                            <form>
                                <h5>Subscribe to our newsletter</h5>
                                <p>Monthly digest of what's new and exciting from
                                    us.</p>
                                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                    <label for="newsletter1" class="visually-hidden">Email
                                        address</label>
                                    <input id="newsletter1" type="text" class="form-control"
                                        placeholder="Email address">
                                    <button class="btn btn-primary" type="button">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                        <p>&copy; 2022 Company, Inc. All rights reserved.</p>
                        <ul class="list-unstyled d-flex">
                            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi"
                                        width="24" height="24">
                                        <use xlink:href="#twitter" />
                                    </svg></a></li>
                            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi"
                                        width="24" height="24">
                                        <use xlink:href="#instagram" />
                                    </svg></a></li>
                            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi"
                                        width="24" height="24">
                                        <use xlink:href="#facebook" />
                                    </svg></a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>

<script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/sidebar.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
<script src="{{ asset('js/addtocart.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>

</html>
