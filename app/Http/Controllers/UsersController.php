<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:8|confirmed',
            'password_confirmation' => 'bail|required',
            'agree_terms' => "bail|required|accepted",
        ], [
            'username.required' => 'Name is required. Vui lòng nhập đúng họ và tên của mình.',
            'password.min' => 'Password có ít nhất 8 ký tự.',
            'password.regex' => 'Password phải bao gồm 1 ký tự viết hoa chữ cái đầu tiên và bao gồm số và ký tự đặc biệt.',
            'email.required' => 'Nhập email.',
            'email.email' => 'Email không đúng định dạng.',
        ]);

        // Tạo một đối tượng User mới và lưu vào cơ sở dữ liệu
        $user = new Users();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hash password trước khi lưu

        $user->save();

        return redirect()->route('login.form')->with("success","create user successfully"); // Chuyển hướng đến trang index
    }

    public function showFormLogin()
    {
        return view("account/sign_in");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email"=> "bail|required|email",
            "password"=> "bail|required|min:8"
        ]);

        $email = $request->email;
        $password = $request->password;
        // ? tìm xem có email trong database mà ng dùng nhập vô không
        $user = Users::where("email", $email)->first();
        // ? Nếu có thì
        if ($user)
        {
            if(Hash::check($password, $user->password))
            {
                // ! Taoj ra session với 1 mảng
                session()->put("userInfo", $user->toArray());
                if($user->role == "admin")
                {
                    return redirect()->route("admin.index")->with("success","login successfully");

                }
                elseif ($user->role == "users") {
                    return redirect()->route("index")->with("success","login successfully");
                }
            }
            else
            {
                return redirect()->back()->with("error","Invalid credentials");
            }
        }
        else{
            return redirect()->back()->with("error","Invalid credentials");
        }
    }

    public function logout()
    {
        session() -> forget("userInfo");
        return redirect("/");
    }

    // public function redirectGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function loginGoogle()
    // {
    //     try {
    //         $googleUser = Socialite::driver('google')->user();

    //         $user = Users::where('email', $googleUser->email)->first();

    //         if(!$user)
    //         {
    //             $new_user = new Users();
    //             $new_user->email = $googleUser->email;
    //             $new_user->save();

    //             session()->put('userInfo', $new_user);
    //         }
    //         else
    //         {
    //             session()->put('userInfo', $user->toArray());
    //         }
    //         return redirect('/');
    //     } catch (\Throwable $th) {
    //         dd("Something went wrong! " .$th->getMessage());
    //     }
    // }
}
