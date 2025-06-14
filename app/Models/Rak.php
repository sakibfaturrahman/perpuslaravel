<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'rak';
    protected $primarykey = 'id';
    protected $fillable = ['rak', 'baris'];
    public $timestamps = false;

    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }
}
