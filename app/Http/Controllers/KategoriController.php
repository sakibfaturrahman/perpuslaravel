<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function kategori()
    {
        $data = [
            'kategori' => Kategori::all(),
            'rak' => Rak::all(),
        ];
        return view('buku.kategori', $data);
    }

    //simpan ke database
    public function tambah(Request $request)
    {

        $request->validate([
            'nama_kategori' => 'required',
            'rak_id' => 'required',
        ]);

        $kategori = Kategori::create($request->all());
        Alert::success('Berhasil Menambahkan Kategori!');
        return redirect()->back();

        // dd($request->all());
    }

    public function edit($id, Request $request)
    {

        $request->validate([
            'nama_kategori' => 'required',
            'rak_id' => 'required',
        ]);

        $kategori = Kategori::find($id)->update($request->all());
        // Session::flash('info', 'Berhasil MengEdit Kategori ini!');
        Alert::toast('berhasil mengupdate kategori ini', 'success');
        return redirect()->back();
    }

    // delete objek didalam tabel
    public function destroy($id)
    {

        $kategori = Kategori::findorFail($id)->delete();
        Session::flash('warning', 'Berhasil Mengahapus 1 Kategori ini dari Daftar Kategori!');
        return redirect()->back();
    }
}
