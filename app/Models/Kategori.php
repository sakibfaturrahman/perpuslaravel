<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primarykey = 'id';
    protected $fillable = ['nama_kategori', 'rak_id'];
    public $timestamps = false;

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kategori_id', 'id');
    }
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
}
