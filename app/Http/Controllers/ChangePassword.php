<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\NguyenPhuongNam27;
class ChangePassword extends Controller
{
    public function emailAuthPage()
    {
        return view('emailAuthentication');
    }
    public function token()
    {
        return view('token');
    }
    public function change()
    {
        return view('changePassword');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'Password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&"*()\-_=+{};:,<.>]).{8,}+$/',
                'NewPassword' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&"*()\-_=+{};:,<.>]).{8,}+$/',
                'ConfirmNewPass' => 'required|same:NewPassword',

            ]);
            if ($validator->fails()) {
                return redirect('loginSuccess/changePassword')->with('message', 'Change Password Failed');
            } else {
                $user = Auth::user();
                if (Hash::check($request->Password, $user->password)) {
                    $result = NguyenPhuongNam27::find($user->id);
                    $result->password = Hash::make($request->NewPassword);
                    $result->save();
                    Auth::logout();
                    return redirect('login')->with('message', 'Change Password Success');
                } else {
                    return redirect('loginSuccess/changePassword')->with('message', 'Change Password Failed');
                }

            }
        }

    }
}
