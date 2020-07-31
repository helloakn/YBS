<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    //
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('AdminLogIn');
 
    }

    public function login(Request $request){
        return view('Admin.Pages.login');
    }
    public function checklogin(Request $request){
        //dd($request->email);
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|min:6|max:20',
        ]);

        if ($validator->fails()) {
           // return "fucking failed";

           
            //dd($validator);
           
            return redirect()->route('AdminLogIn')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $creditial = array('email' => $request->email, 'password' => $request->password);
           //$rem = $request->input('remember');
           if (Auth::guard('admins')->attempt($creditial))
           {
                return redirect()->route('AdminDashBoard');
           }else{
               
               return redirect()->route('AdminLogIn')
               ->withErrors(['login'=>'Login information is incorrect!'])
               ->withInput();
                //->with("loginFailed","Account Login Fail !");
           }
        }
    }

    public function home(Request $request){
        return view('Admin.Pages.home');
    }
}
