<?php

namespace App\Models;
use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mothers extends Model
{

    protected $table = 'mothers';

    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_tlp',
    ];

//tanda bahwa tabel User punya relasi Many dg tabel Post

    
    public function child()
{
    return $this->hasMany(Child::class);
}

}
