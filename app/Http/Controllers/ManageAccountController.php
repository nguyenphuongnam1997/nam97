<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguyenPhuongNam27;
use App\Models\Book;
use App\Models\BorrowBook;
use App\Models\Role;
use Validator;
class ManageAccountController extends Controller
{
    //Danh sách tài khoản
    public function getALL(){
        $users = NguyenPhuongNam27::paginate(5);
        $users->load('role');
        return view('Layout/Account',['users' => $users]);
    }
    public function getDelete($id){
        $user = NguyenPhuongNam27::find($id);
        $user->delete();
        return redirect('admin/manageAdmin/listUser')->with('messageDeleteAccount','Delete Account Success');
    }
    public function getEdit($id){
        $users = NguyenPhuongNam27::find($id);
        $roles = Role::all();
        return view('Layout/editAccount',['users' => $users],['roles' => $roles]);
    }
    public function getEditAccount($id,Request $request){
        $request->offsetUnset('_token');
        NguyenPhuongNam27::where(['id'=>$id])->update($request->all());
        return redirect('admin/manageAdmin/listUser')->with('messageEditAccount','Edit Account Success');
    }
    public function getAddAccountPost(Request $request){
        if($request -> isMethod('POST')){
            $validator = Validator::make($request->all(),[
                'Username' => 'required|unique:nguyen_phuong_nam27s',
                'Email' => 'required|unique:nguyen_phuong_nam27s',
                'Password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&"*()\-_=+{};:,<.>]).{8,}+$/',
                'Passauth' => 'required|same:Password'
            ]);
            if($validator->fails()){
                return redirect('admin/manageAdmin/listUser')->with('messageAddAccount','Add Account Failed');
            }else{
                $user = new NguyenPhuongNam27();
                $user->username = $request->Username;
                $user->password = Hash::make($request->Password);
                $user->email = $request->Email;
                $user->role_id = $request->Role_id;
                $user->phonenumber = $request->Phone;
                $user->address = $request->Address;
                $user->save();
                return redirect('admin/manageAdmin/listUser')->with('messageAddAccount', 'Add Account Success');;
            }
        }

    }
    public function store(){
        return view('User.manageAdmin');
    }
    public function Account(){
        return view('Layout.Account');
    }
    public function getAddAccount(){
        $roles = Role::all();
        return view('Layout.addAccount',['roles' => $roles]);
    }
    public function getRole(){
        $roles = Role::all();
        return view('Layout.listRole',['roles' => $roles]);
    }
    public function getaddRole(){
        return view('Layout.addRole');
    }
    public function getaddRolePost(Request $request){
        if($request -> isMethod('POST')){
            $validator = Validator::make($request->all(),[
                'name' => 'required|unique:roles',
                'description' => 'required',
            ]);
            if($validator->fails()){
                return redirect('admin/manageAdmin/role')->with('messageAddRole','Add Role Failed');
            }else{
                $role = new Role();
                $role->name = $request->name;
                $role->description = $request->description;
                $role->save();
                return redirect('admin/manageAdmin/role')->with('messageAddRole', 'Add Role Success');
            }
        }
    }
    public function geteditRole($id){
        $users = NguyenPhuongNam27::find($id);
        $roles = Role::all();
        return view('Layout/editRole',['users' => $users],['roles' => $roles]);
    }
    public function geteditRolePost($id,Request $request){
        $request->offsetUnset('_token');
        NguyenPhuongNam27::where(['id'=>$id])->update($request->all());
        return redirect('admin/manageAdmin/listUser')->with('messageEditRole','Edit Role Success');
    }

}
