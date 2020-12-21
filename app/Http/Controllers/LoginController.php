<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguyenPhuongNam27;
use App\Models\Book;
use Validator;
class LoginController extends Controller
{
    public function Store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'Username' => 'required',
                'Password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                return redirect('login')->with('message', 'Login Failed');
            }else{
                if (Auth::attempt(['username' => $request->Username, 'password' => $request->Password])) {
                    return redirect('loginSuccess');
                }else{
                    return redirect('login')->with('message', 'Login Failed');
                }
            }

        }
    }
    public function loginSuccess(){
        $books = Book::paginate(10);
        return view('loginSuccess',['books' => $books]);
    }
    public function login()
    {
        return view('User/login');
    }
    public function loginAdmin(){
        return view('User/admin');
    }
    public function loginAdminPost(Request $request){
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'Username' => 'required',
                'Password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                return redirect('login')->with('message', 'Login Failed');
            }else{
                if (Auth::attempt(['username' => $request->Username, 'password' => $request->Password])) {
                    return redirect('admin/manageAdmin');
                }else{
                    return redirect('login')->with('message', 'Login Failed');
                }
            }

        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
