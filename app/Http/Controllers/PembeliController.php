<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pembeli;
class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pembelis')->get();
        return view('pembeli.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Pembeli::get();
        return view ('pembeli.insert_pembeli',compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pembeli();
        $data->name = $request->get('nama');
        $data->address = $request->get('alamat');
        $data->telepon = $request->get('telepon');

        $data->save();
        return redirect()->route('pembeli.index')-> with('status','Data baru berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pembeli)
    {
        $res = Pembeli::find($pembeli);
        if($res){
            // apabila data ditemukan
            $message = $res;
        }
        else{
            // apabila data tidak ditemukan
            $message = Null;
        }
        
        return view("pembeli.show", compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        //dd($user_id);
        // $data = Pembeli::find($user_id);
        // return view ('pembeli.edit',compact('data'));

        $data = DB::table('pembelis')
                ->where('user_id', $user_id)
                ->get();
        return view ('pembeli.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $nama = $request->get('nama');
        $alamat = $request->get('alamat');
        $telepon  = $request->get('telepon');

        DB::table('pembelis')
            ->where('user_id', $user_id)
            ->update([
                'name' => $nama,
                'address' => $alamat,
                'telepon' => $telepon,
            ]);

        return redirect()->route('pembeli.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        DB::table('pembelis')
        ->where('user_id', $user_id)
        ->delete();

        return redirect()->route('pembeli.index')->with('status', 'Data berhasil dihapus');
    }
}
