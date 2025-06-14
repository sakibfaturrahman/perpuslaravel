<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\LogPinjam;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\PDF;


class PinjamanController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            // 'user' => User::where('id', '!=', 1)->get()
            // 'user' => User::where('name', 'like', '%' . $request->search . '%')->first(),
            // 'buku' => Buku::where('nama_buku', 'like', '%' . $request->nama_buku . '%')->get(),
            'pinjam' => LogPinjam::where('log_pinjam', 'like', '%' . $request->search . '%')->get(),
        ];
        return view('buku.pinjam', $data);
    }

    //simpan pinjaman buku/ proses pinjam buku
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
        ]);

        $request['log_pinjam'] = Carbon::now()->toDateString();
        $request['log_kembali'] = Carbon::now()->addDay(7)->toDateString();
        //pilih buku sesuai status-> in stock
        $buku = Buku::findOrFail($request->buku_id)->only('status');

        //proses jika buku yang di pijam ber status not available maka tidak bisa dipinjam
        if ($buku['status'] != 'in stock') {
            Alert::error('Opps, Sepertinya buku ini sedang dipinjam , Silahkan pinjam buku lain!');
            return redirect('data/pinjam');
        } else {
            $count = LogPinjam::where('user_id', $request->user_id)->where('log_kembali_buku', null)->count();

            if ($count >= 3) {
                Alert::warning('Opps, Sepertinya user ini telah mencapai limit peminjaman buku!');
                return redirect('data/pinjam');
            } else {
                try {
                    DB::beginTransaction();
                    //proses insert ke tabel log
                    LogPinjam::create($request->all());
                    //proses mengupdate status buku ketika dipinjam , dari in stock ke not available
                    $buku = Buku::findOrFail($request->buku_id);
                    $buku->status = 'not available';
                    $buku->save();
                    DB::commit();
                    Alert::success('Buku berhasil dipinjam!');
                } catch (\Throwable $th) {
                    DB::rollBack();
                    // dd($th);
                }
            }
        }
        return redirect('data/pinjam');
    }

    public function kembali()
    {
        $data = [
            'user' => User::all(),
            'buku' => Buku::where('status', 'dipinjam')->get(),
            'pinjam' => LogPinjam::all(),
        ];

        return view('buku.riwayat', $data);
    }

    //proses mengembalikan buku/dan simpan data return buku 
    public function simpan(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
        ]);

        $kembali = LogPinjam::where('user_id', $request->user_id)->where('buku_id', $request->buku_id)->where('log_kembali_buku', null);
        $kembaliData = $kembali->first();
        $countData = $kembali->count();

        //mengubah status buku dari not availabel ke instock setelah dikembalikan 
        $buku = Buku::findOrFail($request->buku_id);
        $buku->status = 'in stock';
        $buku->save();


        if ($countData == 1) {
            //mengembalikan buku yang telah dipinjam 
            $kembaliData->log_kembali_buku =  Carbon::now()->toDateString();
            $kembaliData->save();
            Alert::success('Berhasil mengembalikan buku!');
            return redirect('riwayatpinjam');
        } else {
            //gaada sih -> proses jika menginput user yang tidak meminjam buku 
            Alert::warning('Opps, Sepertinya anda salah menginput User atau Buku!!');
            return redirect('data/pinjam');
        }
    }

    // public function detail($id)
    // {
    //     $data = [
    //         'log' => LogPinjam::findOrfail($id)
    //     ];
    //     return view('buku.detailpinjam', $data);
    // }

    // public function save(Request $request, $id)
    // {
    //     $data['buku_id'] = Buku::find($id)->id;
    //     $data['user_id'] = User::find($id)->id;
    //     dd($data);

    //     $request->validate([
    //         'user_id' => 'required',
    //         'buku_id' => 'required',
    //     ]);
    //     $kembali = LogPinjam::where('user_id', $request->user_id)->where('buku_id', $request->buku_id)->where('log_kembali_buku', null);
    //     $kembaliData = $kembali->first();
    //     $countData = $kembali->count();

    //     //mengubah status buku dari not availabel ke instock setelah dikembalikan 
    //     $buku = Buku::findOrFail($request->buku_id);
    //     $buku->status = 'in stock';
    //     $buku->save();


    //     if ($countData == 1) {
    //         //mengembalikan buku yang telah dipinjam 
    //         $kembaliData->log_kembali_buku =  Carbon::now()->toDateString();
    //         $kembaliData->save();
    //         Alert::success('Berhasil mengembalikan buku!');
    //         return redirect('riwayatpinjam');
    //     } else {
    //         //gaada sih -> proses jika menginput user yang tidak meminjam buku 
    //         Alert::warning('Opps, Sepertinya anda salah menginput User atau Buku!!');
    //         return redirect('data/pinjam');
    //     }
    // }

    public function form()
    {

        $data = [
            'user' => User::where('role_id', 2)->get(),
            'buku' => Buku::all(),
            'pinjam' => LogPinjam::all(),
        ];

        return view('buku.form', $data);
    }

    public function formr(Request $request)
    {

        $data = [
            'user' => User::where('role_id', 2)->get(),
            'buku' => Buku::all(),
            'pinjam' => LogPinjam::all()

        ];

        return view('buku.formreturn', $data);
    }

    public function pdf()
    {
        $pinjam = LogPinjam::all();
        $pdf = PDF::loadView('buku.pdf', compact('pinjam'));
        return $pdf->download('library.pdf');
    }
}
