<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function showCoupon(Request $request)
    {
        $coupons = Coupon::all();
        return view("admin.coupon.index", compact('coupons'));
    }

    public function create()
    {
        return view("admin.coupon.create");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $coupons = new Coupon();
        $coupons->coupon_code = $data['coupon_code'];
        $coupons->coupon_number = $data['coupon_number'];
        $coupons->coupon_condition = $data['coupon_condition'];

        $coupons->save();
        session()->put('coupon', $coupons);

        return redirect()->route("showCoupon")->with("success", "Create Coupon successfully");
    }

    public function selectCoupon($id)
    {
        // Lấy thông tin mã giảm giá từ ID
        $newCoupon = Coupon::find($id);

        // Lấy danh sách mã giảm giá đã chọn từ session
        $cart = session()->get('cart');

        if(empty($cart))
        {
            session()->forget('coupon');
        }
        else
        {
            $coupon_session = session()->get('coupon');

            if ($coupon_session) {
                // Xóa session cũ
                session()->forget('coupon');
            }

            // Thêm mã giảm giá mới vào session
            $coupon_session = [
                $id => [
                    'id' => $id,
                    'code' => $newCoupon->coupon_code,
                    'number' => $newCoupon->coupon_number,
                    'condition' => $newCoupon->coupon_condition,
                ]
            ];
            session()->put('coupon', $coupon_session);
        }



        return response()->json([
            'code' => 200,
            'message' => 'success',
        ]);
    }




    public function delete()
    {

    }
}
