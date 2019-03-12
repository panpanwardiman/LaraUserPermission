<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Siswa extends Model
{
    
    protected $fillable = ['name', 'birth', 'gender', 'address', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function getBirthAttribute($value)
    {   
        return Carbon::parse($value);
    }

}
