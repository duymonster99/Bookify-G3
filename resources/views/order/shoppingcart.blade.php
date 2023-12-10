@extends('index')
@section('content')
    <div class="row" data-url="{{ route('deleteCart') }}">

        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover update_cart_url">
                <thead>
                    @if (isset($carts))
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    @endif
                </thead>
                <tbody>
                    @if (isset($carts))
                        @if (!$checkout_success)
                            @foreach ($carts as $id => $cartItem)
                                <tr>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>{{ $cartItem['id'] }}</strong></td>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object"
                                                    src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png"
                                                    style="width: 72px; height: 72px;"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">{{ $cartItem['name'] }}</a></h4>
                                                {{-- <h5 class="media-heading"> by <a href="#">{{ $cartItem['author'] }}</a></h5> --}}
                                                <span>Status: </span><span class="text-success"><strong>In
                                                        Stock</strong></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                            value="{{ $cartItem['quantity'] }}" min="1">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>$
                                            {{ number_format($cartItem['price']) }}</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>$
                                            {{ $cartItem['price'] * $cartItem['quantity'] }}</strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <a href="{{ route('showCart') }}" data-id="{{ $id }}"
                                            class="btn btn-warning cart_update">
                                            <span class="glyphicon glyphicon-remove"></span> Update
                                        </a>
                                        <a href="{{ route('showCart') }}" data-id="{{ $id }}"
                                            class="btn btn-danger cart_delete">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="1" style="font-weight:bold"> Shop khuyến mãi </td>
                                <td>
                                    <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <small id="couponDiscountColumn">Nhập hoặc chọn mã</i></small>
                                    </button>

                                    {{-- <button type="button" class="btn btn-danger delete_coupon">
                                        Remove all Coupon
                                    </button> --}}

                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>

                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td class="text-right">
                                    <h5><strong>$ {{ $subtotal }}</strong></h5>
                                </td>
                            </tr>

                            @if (isset($cart_coupon) && is_array($cart_coupon))
                                @foreach ($cart_coupon as $itemCoupon)
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>
                                            <h5>
                                                Mã khuyến mãi
                                            </h5>
                                        </td>
                                        <td class="text-right">
                                            <h5><strong>${{ $itemCoupon['number'] }}</strong></h5>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <h3>Total</h3>
                                </td>
                                <td class="text-right">
                                    <h3><strong>$ {{ $total }}</strong></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <a href="{{ route('client.products.index') }}" type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                    </a>
                                </td>
                                <td>
                                    @if (session('userInfo'))
                                        <a href="{{ route('showCheckout') }}" type="button" class="btn btn-success">
                                            Checkout <span class="glyphicon glyphicon-play"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('login.form') }}" type="button" class="btn btn-success">
                                            Checkout <span class="glyphicon glyphicon-play"></span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @else
                        @php
                            echo "<div style='text-align:center;'>Không có sản phâm nào trong giỏ hàng!</div>";
                        @endphp
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Khuyến mãi từ Shop
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        @foreach ($coupons as $cou)
                            <div class="card mb-3 select_coupon" @if ($used) style="display: none" @endif
                                style="width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('book_images/vocab2.jpg') }}"
                                            class="img-fluid rounded-start h-100" alt="...">
                                    </div>
                                    <div class="col-md-8">

                                        <div class="card-body">
                                            <h5 class="card-title">Nhập mã
                                                "{{ $cou->coupon_code }}": Giảm
                                                {{ $cou->coupon_number }}$</h5>
                                            <p class="card-text">Cho đơn hàng từ
                                                {{ $cou->coupon_condition }}$</p>
                                            @if ($subtotal < $cou->coupon_condition)
                                                <a type="submit" data-bs-dismiss="modal" aria-label="Close"
                                                    class="selectCouponBtn btn btn-primary disabled">Select</a>
                                            @else
                                                <a type="submit" data-bs-dismiss="modal" aria-label="Close"
                                                    class="selectCouponBtn btn btn-primary"
                                                    data-url="{{ route('select.coupon', ['id' => $cou->id]) }}">Select</a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
