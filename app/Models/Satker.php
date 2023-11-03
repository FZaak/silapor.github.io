<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;
    protected $table = 'satker';

    protected $fillable = [
        'nama_satuan_kerja'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
