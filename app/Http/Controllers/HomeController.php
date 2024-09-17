<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Admin;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    //tampil barang customer
    public function tampilBarang()
    {

        $barang = Barang::all();
        return view('barang_customer', compact('barang'));

    }
    //tampil produk admin
    public function tampilProduk()
    {

        $barang = Barang::all();
        $sesi = session('admin');
        $adm = session('id_admin');

        $admin = Admin::where('id_admin', $adm)->first();
        
        if ($sesi == true) {
            return view('produk', compact('barang','admin'));
        } else {
            return redirect('login_admin');
        }
        
    }

    public function tambahBarang()
    {
        return view('tambah_barang');
    
    }   
    function prosesTambahBarang(Request $request){
        $nama_barang = $request->input('nama_barang');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');
        $stok = $request->input('stok');

        $foto_barang = $request->file('foto_barang');
        $thumb = $foto_barang->getClientOriginalName();

        $path = public_path() . '/foto_barang';

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
            $foto_barang->move($path, $thumb);
        }
        else {
            $foto_barang->move($path, $thumb);
        }

        $barang = new Barang;
        $barang->nama_barang = $nama_barang;
        $barang->deskripsi = $deskripsi;
        $barang->harga = $harga;
        $barang->stok = $stok;
        $barang->foto_barang = $thumb;
        $barang->save();


            if($barang){
                return redirect('produk');
            }else{
                return redirect('produk')->with('error', 'Data gagal ditambahkan');
            }
    }
    public function editBarang($id_barang){
        $barang = Barang::where('id_barang', $id_barang)->first();
        return view('edit_barang', compact('barang'));
    }
    function prosesEditBarang(Request $request){
        $id_barang = $request->input('id_barang');
        $nama_barang = $request->input('nama_barang');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');
        $stok = $request->input('stok');
        $foto_barang = $request->file('foto_barang');

        $path = public_path() . '/foto_barang';

        $query = Barang::where('id_barang', $id_barang)->first();
        $foto_lama = $query->foto_barang;
        

        if ($foto_barang){
            $thumb = $foto_barang->getClientOriginalName();
            File::delete($path . '/' . $foto_lama);
            $foto_barang->move($path, $thumb);
        }
        $query->nama_barang = $nama_barang;
        $query->deskripsi = $deskripsi;
        $query->harga = $harga;
        $query->stok = $stok;
        $query->foto_barang = $thumb;
        $query->save();

        if ($query){
            return redirect('produk');
        }else{
            echo "Data gagal diubah";
            return redirect('produk');
        }
    }
    function hapusBarang(Request $request){
        $id_barang = $request->input('id_barang');
        $brg = Barang::where('id_barang',$id_barang)->first();
        $path = public_path() . '/foto_barang';
        $foto = $brg->foto_barang;
        if($brg){
            $brg->delete();
            File::delete($path .'/' . $foto);
            return redirect('produk');
        }else{
            echo "Barang tidak ditemukan";

            return redirect('produk');
        }


    }
    public function Cart(){
        //gabungkan tabel barang dan cart berdasarkan id barang
        $cart = Cart::join('barang','barang.id_barang','=','cart.id_barang')
        ->get();
        return view('keranjang', compact('cart'));
    }
    
    function addToCart(Request $request){
        $barang_id = $request->input('id_barang');
        $qty = $request->input('qty');

        //cek apakah barang yang dipilih sudah ada di keranjang
        $cartCheck = Cart::where('id_barang',$barang_id)->first();

        //jika sudah ada, maka update jumlahnya
        if($cartCheck){
            $cartCheck->qty = $cartCheck->qty + $qty;
            $cartCheck->save();
        }else{ //jika belum ada, tambahkan barang baru
            $cart = new Cart;
            $cart->id_barang = $barang_id;
            $cart->qty = $qty;
            $cart->save();
        }

        return redirect('cart'); //arahkan ke halaman cart
    }


    public function updateCart(Request $request)
    {
        $id_cart = $request->input('id_cart');
        $qty = $request->input('qty');

        $cart = Cart::where('id_cart',$id_cart)->first();

        if ($cart) {
            $cart->qty = $qty;
            $cart->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Cart not found.']);
        }
    }
}