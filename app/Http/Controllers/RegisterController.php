<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguyenPhuongNam27;
use Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> isMethod('POST')){
            $validator = Validator::make($request->all(),[
                'Username' => 'required|unique:nguyen_phuong_nam27s',
                'Email' => 'required|unique:nguyen_phuong_nam27s',
                'Password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&"*()\-_=+{};:,<.>]).{8,}+$/',
                'Passauth' => 'required|same:Password'
            ]);
            if($validator->fails()){
                return redirect('register')->with('message','Resgister Failed');
            }else{
                $user = new NguyenPhuongNam27();
                $user->username = $request->Username;
                $user->password = Hash::make($request->Password);
                $user->email = $request->Email;
                $user->phonenumber = $request->Phone;
                $user->address = $request->Address;
                $user->save();
                return redirect('/login')->with('message', 'Register Success');;
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
