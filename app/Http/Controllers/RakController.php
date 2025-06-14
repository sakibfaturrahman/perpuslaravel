<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class RakController extends Controller
{
    public function rak()
    {
        $data = [
            'rak' => Rak::all(),
        ];
        return view('buku.rak', $data);
    }

    //add
    public function add(Request $request)
    {

        $request->validate([
            'rak' => 'required',
            'baris' => 'required',
        ]);

        $rak = Rak::create($request->all());
        Session::flash('success', 'Berhasil Menambahkan Rak Baru');
        return redirect()->back();

        // dd($request->all());
    }

    //edit

    public function rubah($id, Request $request)
    {

        $request->validate([
            'rak' => 'required',
            'baris' => 'required',
        ]);

        $rak = Rak::find($id)->update($request->all());
        Session::flash('info', 'Berhasil MengEdit Rak ini!');
        return redirect()->back();
    }

    //hapus
    public function delete($id)
    {

        $rak = Rak::findorFail($id)->delete();
        Session::flash('warning', 'Berhasil Mengahapus 1 Rak ini dari Daftar Rak!');
        return redirect()->back();
    }
}
