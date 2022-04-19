<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use DataTables;



class CustomerController extends Controller
{
    
    public function Index()
    {
        return view('customer.login');
    }  

    public function processCustomerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        // dd(Auth::guard('users')->attempt($credentials));
        if (Auth::guard('users')->attempt($credentials)) {
            // dd('1234');
            return redirect()->intended('customer/customer-product')
                        ->withSuccess('You Have Login Successfully.');
        }
  
        return redirect("/")->withSuccess('Login details are not valid');
    }

    public function Registration()
    {
        return view('customer.registration');
    } 


    public function processCustomerRegistration(Request $request)
    {  
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'contactNumber' => 'required'
        ]);
           
        $data = $request->all();    
        $check = User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'contactNumber' => $data['contactNumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
         
        return redirect("customer-product")->withSuccess('You have signed-in');
    }

    public function Product(Request $request)   
    {
        // dd(Auth::guard('users')->check());
        $data =  array();
        if(Auth::guard('users')->check()){
            $data = Product::paginate(5);
            return view('customer.product')->with('products',$data);
        }

        return redirect("customer/customer-login")->withSuccess('You are not allowed to access');
    } 

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('customer/login');
    }
      
}
