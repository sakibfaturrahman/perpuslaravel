<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPinjam extends Model
{
    use HasFactory;

    protected $table = 'log_pinjam';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'buku_id', 'log_pinjam', 'log_kembali'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
