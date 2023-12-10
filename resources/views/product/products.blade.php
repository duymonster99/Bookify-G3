@extends('index')
@section('content')
    <link href="{{ asset('css/product-page2.css') }}" rel="stylesheet" />

    <div class="product-page-container">
        <div class="product-page-all-container">
            <div class="product-page-hero">
                <img alt="image" src="{{ URL::asset('img/christmas_gift_guide_thumbnail_hp__1_ (custom)-1500w.png') }}"
                    class="product-page-hero-background" />
            </div>
            <div class="product-page-hero-phone">
                <img alt="image" src="{{ URL::asset('img/christmas_gift_guide_thumbnail_hp__1_ (phone)-500w.png') }}"
                    class="product-page-hero-back-phone" />
            </div>
            <div class="product-page-main">
                <div class="product-page-sidebar d-flex flex-nowrap">
                    <div class="flex-shrink-0 p-3" style="width: 100%">
                        <ul class="list-unstyled ps-0">
                            <li class="mb-1">
                                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                    Home
                                </button>
                                <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Overview</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Updates</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Reports</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1">
                                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                                    Dashboard
                                </button>
                                <div class="collapse" id="dashboard-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Overview</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Annually</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1">
                                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                                    Orders
                                </button>
                                <div class="collapse" id="orders-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">New</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Processed</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Returned</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="border-top my-3"></li>
                            <li class="mb-1">
                                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                    Account
                                </button>
                                <div class="collapse" id="account-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">New...</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Profile</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Settings</a>
                                        </li>
                                        <li><a href="#"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Sign
                                                out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="product -page-body">
                    <link rel="stylesheet" href="{{ asset('css/productdemo.css') }}">
                    <div class="container my-5">
                        <div class="row">

                            @foreach ($books as $book)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm shadow-lg">
                                        <a href="{{ route('product_detail') }}">
                                            <img src="{{ asset('img/novel cover-200x300 (Custom).png') }}"
                                                class="card-img mx-auto d-block img-fluid">
                                        </a>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $book->book_name }}</h5>
                                            <p class="card-text">{{ $book->author->author_name }}</p>
                                            <p>{{ $book->publisher->publisher_name }}</p>
                                            <p>{{ $book->price }}</p>
                                            <a href="" data-url="{{ route('addToCart', ['id' => $book->id]) }}"
                                                class="btn btn-primary add_to_cart">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $books->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection
