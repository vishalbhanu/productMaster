<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Session;
use DataTables;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.login');
    } 

    public function processAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect()->intended('admin/admin-product')
                        ->withSuccess('You Have Login Successfully.');
        }
  
        return redirect("admin/admin-login")->withSuccess('Login details are not valid');
    }

    public function Registration()
    {
        return view('admin.registration');
    } 

    public function processAdminRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
         
        return redirect("admin/admin-product")->withSuccess('You have signed-in');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin/admin-login');
    }

    public function Product(Request $request)
    {
        // echo '<pre>';print_r(Auth::guard('admins')->check());die;
        if(Auth::guard('admins')->check()){
            if ($request->ajax()) {
                $data = Product::select('*');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                               $actionBtn = '<a href="javascript:void(0)" data-id='.$row->id.' data-datax='.$row->productName.' data-datay='.$row->price.' data-dataz='.$row->description.' data-dataw='.$row->discountPercentage.' data-toggle="modal" data-target="#edit_modal"  data-toggle="tooltip" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-id='.$row->id.' data-toggle="tooltip" class="delete btn btn-danger btn-sm">Delete</a>'; 
                                return $actionBtn;
                        })
                        ->rawColumns(['action'])
                        // ->setTotalRecords(5)
                        ->make(true);
            }
            return view('admin.product');
        }

        return redirect("admin/admin-login")->withSuccess('You are not allowed to access');
    } 

    public function deleteProduct(Request $request){
        $product = Product::where('id',$request->id)->delete();
        return Response()->json($product);
    }

    public function editProduct(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'price' => 'required',
            'description' => 'required',
            'discountPercentage' => 'required'
        ]);
        $id = $request->editId;
        $product = Product::find($id);
        $product->productName = $request->productName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->discountPercentage = $request->discountPercentage;
        $product->save();

        return redirect()->route('admin.product')
        ->with('success','Product Has Been updated successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'price' => 'required',
            'description' => 'required',
            'discountPercentage' => 'required'
        ]);
        $product = new Product;
        $product->productName = $request->productName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->discountPercentage = $request->discountPercentage;
        $product->save();
        return redirect()->route('admin.product')
        ->with('success','product has been created successfully.');
    }
}
