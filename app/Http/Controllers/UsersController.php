<?php

namespace App\Http\Controllers;

use App\Models\LogPinjam;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'user' => User::all(),
            'user' => User::where('name', 'like', '%' . $request->search . '%')->get(),
        ];
        return view('admin.datauser', $data);
    }

    public function profil($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'jumlah' => LogPinjam::where('user_id', $id)->count(),
            // 'buku' =>  LogPinjam::with(['user', 'buku'])
        ];
        return view('admin.profil', $data);
    }

    public function pinjaman()
    {


        // return Auth::user()->id;

        $data = [
            'buku' => Buku::all(),
            'pinjam' => LogPinjam::with(['user', 'buku'])->where('user_id', Auth::user()->id)->get(),
            'total' => LogPinjam::where('user_id', Auth::user()->id)->count(),

        ];
        return view('pinjam', $data);
    }

    public function store(Request $request)
    {
        // return "oke";
        $request['user_id'] = Auth::user()->id;
        $request['log_pinjam'] = Carbon::now()->toDateString();
        $request['log_kembali'] = Carbon::now()->addDay(7)->toDateString();


        //pilih buku sesuai status-> in stock(ada atau tidak sedang dipinjam)
        $buku = Buku::findOrFail($request->buku_id)->only('status');

        //proses jika buku yang di pijam ber status not available maka tidak bisa dipinjam
        if ($buku['status'] != 'in stock') {
            Alert::error('Opps, Sepertinya buku ini sedang dipinjam', 'Silahkan pinjam buku lain!');
            return redirect('book');
        } else {
            $count = LogPinjam::where('user_id', $request->user_id)->where('log_kembali_buku', null)->count();
            if ($count >= 3) {
                Alert::warning('Opps, Sepertinya anda telah mencapai limit peminjaman buku!');
                return redirect('pinjam');
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
                    Alert::success('Buku berasil dipinjam!');
                } catch (\Throwable $th) {
                    DB::rollBack();
                    // dd($th);
                }
            }
        }
    }

    public function user()
    {
        $data = [
            'total' => LogPinjam::where('user_id', Auth::user()->id)->count(),
            'pengguna' => User::all(),
        ];
        return view('user.profil', $data);
    }
}
