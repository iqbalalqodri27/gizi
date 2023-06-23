<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Child;
use App\Models\Mothers;


class Posyandu extends Model
{
    protected $table = 'posyandus';

    use HasFactory;

    protected $fillable = [
        'child_id',
        'berat_badan',
        'tinggi_badan',
        'lingkaran_kepala',
        'status',
        'status_gizi',
    ];

    public function mothers()
    {
    	return $this->belongsTo(Mothers::class);
    }

    public function child()
    {
    	return $this->belongsTo(Child::class);
    }
   

}
