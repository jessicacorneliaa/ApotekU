<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Obat;
use App\Kategori;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('obats as o') 
        ->join('kategoris as c', 'o.kategori_id','=','c.id')
        ->select('o.id as id','o.image as gambar','o.generic_name as nama_obat','o.restriction_formula as restriction_formula','o.price as harga','c.nama as nama_kategori')
        ->get();

        //dd($data);
        return view('obat.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Kategori::get();
        return view ('obat.insert_obat',compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Obat();
        $data->generic_name= $request->get('generic_name');
        $data->form= $request->get('form');
        $data->restriction_formula= $request->get('restriction_formula');
        $data->price= $request->get('price');
        $data->description= $request->get('description');
        if($request->input('faskes1')!==null){
          $data->faskes1= 1;
        }
        else{
          $data->faskes1= 0;
        }
        
        if($request->input('faskes2')!==null){
          $data->faskes2= 1;
        }
        else{
          $data->faskes2= 0;
        }
        
        if($request->input('faskes3')!==null){
          $data->faskes3= 1;
        }
        else{
          $data->faskes3= 0;
        }

        $data->kategori_id= $request->get('category_id');
        
        $data->save();
        // redirect()->action('MedicineController@index');
        return redirect()->route('obat.index')->with('status', 'Data baru berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($obat)
    {
        $res = Obat::find($obat);
        if($res){
            // apabila data ditemukan
            $message = $res;
        }
        else{
            // apabila data tidak ditemukan
            $message = Null;
        }
        
        return view("obat.show", compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Obat::find($id);
        $categories = Kategori::get();
        return view ('obat.edit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $obat->generic_name= $request->get('generic_name');
        $obat->form= $request->get('form');
        $obat->restriction_formula= $request->get('restriction_formula');
        $obat->price= $request->get('price');
        $obat->description= $request->get('description');
        $obat->save();
        return redirect()->route('obat.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obat.index')->with('status', 'Data berhasil dihapus');
    }

    public function front_index(){
        $products= Obat::all();
        return view('frontend.product', compact('products'));
        if($this->authorize('check-admin')){
            dd("a");
            return redirect()->route('obat.index');
        }       
    }

    public function front_obat(){
        $products= Obat::all();
        return view('frontend.obat', compact('products'));
    }

    public function addToCart($id){
        $products= Obat::find($id);
        $cart= session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id]= [
                "name"=> $products->generic_name . "(". $products->form . ")",
                "quantity"=> 1,
                "price"=> $products->price,
                "image"=> $products->image
            ];
        }
        else{
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart); 
        return redirect()->back()->with('success', 'Product '.$cart[$id]['name'].' added to cart successfully, with quantity is '.$cart[$id]['quantity']);
  }

  public function checkout(){
      return view('frontend.checkout');
  }

  public function submitCheckout(){
    // $this->authorize('check-member');
    $cart= session()->get('cart');

    $user= Auth::user();
    $transaksi= new Transaksi;
    $transaksi->pembeli_id= Auth::user()->id;
    $transaksi->tanggal= Carbon::now()->toDateTimeString();
    $transaksi->save();

    $totalHarga= $transaksi->insertProduct($cart, $user);
    $transaksi-> total= $totalHarga;
    $transaksi->save();

    session()->forget('cart');
    return redirect('home');
}

}
