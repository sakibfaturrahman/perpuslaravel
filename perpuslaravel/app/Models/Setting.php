<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'setting';
    protected $primarykey = 'id';
    protected $fillable = ['title', 'rules1', 'rules2', 'rules3', 'banner1', 'banner2', 'banner3', 'about', 'gambar1', 'gambar2', 'gambar3'];
    public $timestamp = false;
}
