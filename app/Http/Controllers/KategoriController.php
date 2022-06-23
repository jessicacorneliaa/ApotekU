<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategori;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('check-admin');
        $kategoridata = DB::table('kategoris')->get();

        return view('kategori.index', compact("kategoridata"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kategori.insert_kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kategori();
        $data->nama = $request->get('nama');
        $data->deskripsi = $request->get('deskripsi');
        $data->save();
        return redirect()->route('kategori.index')-> with('status','Data baru berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kategori)
    {
        $this->authorize('check-admin');
        $res = Kategori::find($kategori);
        if($res){
            // apabila data ditemukan
            $message = $res;
        }
        else{
            // apabila data tidak ditemukan
            $message = Null;
        }
        
        return view("kategori.show", compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('check-admin');
        $data = Kategori::find($id);
        return view ('kategori.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $kategori->nama= $request->get('nama');
        $kategori->deskripsi= $request->get('deskripsi');
        $kategori->save();
        return redirect()->route('kategori.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategoris')
            ->where('id', $id)
            ->delete();

        return redirect()->route('kategori.index')->with('status', 'Data berhasil dihapus');
    }
}
