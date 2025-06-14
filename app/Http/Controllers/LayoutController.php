<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\LogPinjam;
use App\Models\Setting;

class LayoutController extends Controller
{

    // halaman utama
    public function index()
    {
        $data = [
            'kategori' => Kategori::all(),
            'buku' => Buku::paginate(3)
        ];
        return view('home', $data);
    }

    //about
    public function about()
    {
        return view('about');
    }

    //nampil buku
    public function buku(Request $request)
    {
        $data = [
            'kategori' => Kategori::all(),
            // 'buku' => Buku::paginate(2),
            'buku' => Buku::where('nama_buku', 'like', '%' . $request->nama_buku . '%')->get(),

        ];
        return view('daftarbuku', $data);
    }

    //show menurut kategori
    public function kategori($kategori)
    {
        $data = [
            'kategori' => Kategori::find($kategori),
        ];
        return view('kategoribuku', $data, compact('kategori'));
    }


    //detail buku user
    public function details($id)
    {
        $data = [
            'buku' => Buku::findOrfail($id),

        ];
        return view('detailbook', $data);
    }
    //pinjam user
    public function simpan(Request $request, $id)
    {

        $data['buku_id'] = Buku::find($id)->id;
        $data['user_id'] = Auth::user()->id;
        $data['log_pinjam'] = Carbon::now()->toDateString();
        $data['log_kembali'] = Carbon::now()->addDay(7)->toDateString();
        $data['user_id'] = auth()->user()->id;
        $buku = Buku::find($data['buku_id'])->first();

        //pilih buku sesuai status-> in stock(ada atau tidak sedang dipinjam)

        //proses jika buku yang di pijam ber status not available maka tidak bisa dipinjam
        if ($buku->status != 'in stock') {
            Alert::error('Opps, Sepertinya buku ini sedang dipinjam', 'Silahkan pinjam buku lain!');
            return redirect('book');
        } else {
            $count = LogPinjam::where('user_id', $request->user_id)->where('log_kembali_buku', null)->count();
            if ($count >= 3) {
                Alert::warning('Opps, Sepertinya user ini telah mencapai limit peminjaman buku!');
                return redirect('book');
            } else {
                try {
                    DB::beginTransaction();

                    //proses insert ke tabel log
                    LogPinjam::create($data);
                    //proses mengupdate status buku ketika dipinjam , dari in stock ke not available 
                    $buku = Buku::findOrFail($data['buku_id']);
                    $buku->status = 'not available';

                    $buku->save();
                    DB::commit();
                    Alert::success('Berhasil meminjam Buku!', 'Silahkan datangi Perpustakaan untuk mengambil buku!');
                    return redirect('pinjam');
                } catch (\Throwable $th) {
                    DB::rollBack();
                    // dd($th);
                }
            }
        }
    }
}
