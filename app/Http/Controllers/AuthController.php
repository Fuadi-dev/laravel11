<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Admin;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //ADMIN
    public function index_admin(){
        return view('login_admin');
    }
    //proses login
   function login_admin(Request $request){
    $email = htmlspecialchars($request->input ('email'));
    $password = htmlspecialchars($request->input ('password'));

    $user = Admin::where('email', $email)->first();

    if ($user && Hash::check($password, $user->password)) {
        $request->session()->put('admin', true);
        $request->session()->put('id_admin', $user->id_admin);
        return redirect('produk');
    } else {
        return redirect('login_admin')->with('error', 'Email atau password salah');
    }
   }

   //daftar admin
   public function register_admin(){
       return view('register_admin');
    }
    //proses daftar admin
    function regmin(Request $request){
        $email = htmlspecialchars($request->input ('email'));
        $password = htmlspecialchars($request->input ('password'));
        $nama_admin = htmlspecialchars($request->input ('nama_admin'));
        
        $HashedPass = Hash::make($password);
        $admin= new Admin();
        
        
        $admin->email = $email;
        $admin->password = $HashedPass;
        
        $admin->nama_admin = $nama_admin;
        $admin->save();
        return redirect('login_admin');
    }
    //logout admin
    public function logout(Request $request){

        $id = $request->session()->get('id_admin');
        $request->session()->forget('admin');
        $request->session()->forget('id_admin');
        return redirect('login_admin');
    }
    
    //CUSTOMER  
    public function index_customer(){
         return view('login_customer');
    }
    //proses login customer
    function login_customer(Request $request){
     $email = htmlspecialchars($request->input ('email'));
     $password = htmlspecialchars($request->input ('password'));
 
     $user = Customer::where('email', $email)->first();
     
     if($user && Hash::check($password, $user->password)) {
         $request->session()->put('customer', true);
         $request->session()->put('id_customer', $user->id_customer);
         $request->session()->put('nama_customer', $user->nama_customer);
         return redirect('/');
     } else {
         return redirect('login_customer')->with('error', 'Email atau password salah');
     }
    }
    //register customer
    public function register_customer(){
        return view('register_customer');
    }
    //proses daftar customer
    function regmer(Request $request){
        $nama_customer = htmlspecialchars($request->input ('nama_customer'));
        $email = htmlspecialchars($request->input ('email'));
        $password = htmlspecialchars($request->input ('password'));
        $alamt = htmlspecialchars($request->input ('alamat'));
        $no_hp = htmlspecialchars($request->input ('no_hp'));

        $HashedPass = Hash::make($password);
        $customer= new Customer();


        $customer->nama_customer = $nama_customer;
        $customer->email = $email;
        $customer->password = $HashedPass;

        $customer->alamat = $alamt;
        $customer->no_hp = $no_hp;
        $customer->save();
        return redirect('login_customer');
    }
    ///logout customer
    public function logout_customer(Request $request){
        $request->session()->forget('customer');
        $request->session()->forget('nama_customer');
        return redirect('login_customer');
    }
    
    public function tampil_customer(){
        $customer = Customer::all();
        return view('data_customer', compact('customer'));
    }

    public function edit_customer($id_customer){
        $customer = Customer::where('id_customer', $id_customer)->first();
        return view('edit_customer', compact('customer'));
    }

    function prosesEditCustomer(Request $request){
        $id_customer = $request->input('id_customer');
        $nama_customer = $request->input('nama_customer');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $no_hp = $request->input('no_hp');

        $query = Customer::where('id_customer', $id_customer)->first();

        $query->nama_customer = $nama_customer;
        $query->email = $email;
        $query->alamat = $alamat;
        $query->no_hp = $no_hp;
        $query->save();

        if($query){
            return redirect('data_customer');
        }else{
            return redirect('data_customer')->with('error', 'Data gagal diupdate');
        }
    }

    function hapusCustomer(Request $request){
        $id_customer = $request->input('id_customer');
        $cstmr = Customer::where('id_customer', $id_customer)->first();
        if ($cstmr){
            $cstmr->delete();
            return redirect('data_customer');
        }
        else{
            return redirect('data_customer')->with('error', 'Data gagal dihapus');
        }
    }
}
