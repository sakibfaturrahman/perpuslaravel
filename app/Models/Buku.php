<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primarykey = 'id';
    protected $fillable = ['kode_buku', 'nama_buku', 'kategori_id', 'pengarang', 'tahun_terbit', 'gambar', 'deskripsi'];
    public $timestamps = false;


    protected $attributes = [
        'status' => 'in stock'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
