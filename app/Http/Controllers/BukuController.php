<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\LogPinjam;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{

    public function dashboard()
    {
        $data = [
            'buku' => Buku::count(),
            'kategori' => Kategori::count(),
            'user' => User::count(),
            'pinjam' => LogPinjam::all(),
        ];
        return view('dashboard.dashboard', $data);
    }

    //controller buku
    public function index()
    {
        $data = [
            'buku' => Buku::all()
        ];
        return view('buku.databuku', $data);
    }

    //detail
    public function detail($id)
    {
        $data = [
            'buku' => Buku::findOrfail($id)
        ];
        return view('buku.detailbuku', $data);
    }

    //tambah buku
    public function create()
    {
        $data = [
            'kategori' => Kategori::all(),
        ];
        return View('buku.create', $data);
    }

    //simpan ke database
    public function store(Request $request)
    {

        $request->validate([
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'kategori_id' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
        ]);

        $newName = '';
        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->nama_buku . '.' . $extension;

            $request->file('gambar')->storeAs('public/gambar', $newName);
        }

        $payload = $request->except('gambar');
        $payload['gambar'] = $newName;
        $buku = Buku::create($payload);
        Session::flash('success', 'Berhasil Menambahkan Buku Baru');
        return redirect('buku');

        // dd($request->all());
    }
    //edt
    public function ubah($id)
    {
        $data = [
            'buku' => Buku::findOrfail($id),
            'kategori' => Kategori::all(),
        ];
        return view('buku.edit', $data);
    }
    //simpan ke database
    public function update($id, Request $request)
    {

        $request->validate([
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'kategori_id' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',

        ]);

        $newName = '';
        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->nama_buku . '.' . $extension;

            $request->file('gambar')->storeAs('public/gambar', $newName);
        }

        $payload = $request->except('gambar');
        $payload['gambar'] = $newName;
        $buku = Buku::find($id)->update($request->all());
        Alert::success('Berhasil Mengedit Buku!');
        return redirect('buku');

        // dd($request->all());
    }

    //hapus buku
    public function remove($id)
    {
        $buku = Buku::findorFail($id)->delete();
        Alert::success('Berhasil Mengahapus 1 Buku ini dari Daftar Buku!');
        return redirect()->back();
    }
}
