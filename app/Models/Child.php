<?php

namespace App\Models;
use App\Models\Mothers;
use App\Models\Posyandu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 'children';
    use HasFactory;
    protected $fillable = [
        'mothers_id',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'jenis_kelamin',
    ];
  

    public function mothers()
    {
    	return $this->belongsTo(Mothers::class);
    }

    

    public function Posyandu()
    {
    	return $this->hasMany(Posyandu::class);
    }

    


}
