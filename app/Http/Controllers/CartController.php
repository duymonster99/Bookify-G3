<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Coupon;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart($id)
    {
        $books = Book::find($id);

        // $authors = Author::find($id);

        $cart = session()->get('cart');
        // $cart = request()->cookie('cart'); // Lấy giỏ hàng từ cookies
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $books->book_name,
                'price' => $books->price,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);
        // Thiết lập cookie với thông tin giỏ hàng
        // $cookie = cookie('cart', json_encode($cart), 60 * 24 * 7); // Cookie sẽ tồn tại trong 1 tuần

        return response()->json([
            'code' => 200,
            'message' => 'success',
        ]);
    }

    public function showCart()
    {
        $coupons = Coupon::orderBy('coupon_condition', 'ASC')->get();
        $carts = session()->get('cart');
        $cart_coupon = session()->get('coupon');
        $checkout_success = session()->get('checkout_success');

        $subtotal = 0;
        $discountPrice = 0;
        $used = false;
        if (isset($carts)) {
            foreach ($carts as $cartItem) {
                // Calculate subtotal for each item
                $subtotal += $cartItem['price'] * $cartItem['quantity'];
            }

            // dd($subtotal);

            if (isset($cart_coupon) && is_array($cart_coupon)) {
                foreach ($coupons as $cou) {
                    foreach ($cart_coupon  as $couponItem) {
                        // dd($itemCoupon);
                        $coupon_choose = $couponItem["number"];
                        $discountPrice += $coupon_choose;
                        // dd($discountPrice);

                        if ($couponItem['id'] == $cou->id) {
                            $used = true;
                            break;
                        }
                    }
                }
            } else {
                $discountPrice = 0;
            }

            $total = $subtotal - $discountPrice;
            // dd($total);

            session()->put('cart_total', $total);
        } else {
            $total = 0;
        }

        if($checkout_success)
        {
            session()->forget('cart');
        }

        return view("order.shoppingcart", compact('carts', 'coupons', 'total', 'subtotal', 'cart_coupon', 'used', 'checkout_success'));
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view("order.shoppingcart", compact("carts"))->render();
            return response()->json([
                'cart' => $cartComponent,
                'code' => 200
            ], 200);
        }
    }

    public function delete(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view("order.shoppingcart", compact("carts"))->render();
            return response()->json([
                'cart' => $cartComponent,
                'code' => 200
            ], 200);
        }
    }

    public function showFormCheckout()
    {

        return view("payment.payment");
    }
}
