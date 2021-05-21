<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    protected $table = 'ref_kelurahan';
    protected $primaryKey = 'Kd_Kel';
    public $incrementing = false;
    protected $keyType = 'string';
    public function kelurahan()
    {
        return $this->hasOne(kelurahan::class, 'Kd_Kec', 'Kd_Kec');
        // return $this->belongsTo(kelurahan::class);
        // return $this->hasOne(kelurahan::class, ['Kd_Kec', 'Kd_Kel'], ['Kd_Kec', 'Kd_Kel']);
        // return $this->belongsTo(kelurahan::class)
        // ->where('Kd_Kel', 'Kd_Kel')
        // ->where('Kd_Kec', 'Kd_Kec');
        // return $this->hasOne(kecamatan::class, 'Kd_Kec', 'Kd_Kec');
        // return $this->hasManyThrough(
        //     kelurahan::class,
        //     kecamatan::class,
        //     'Kd_Kec', // Foreign key on the cars table...
        //     'Kd_Kel', // Foreign key on the owners table...
        //     'Kd_Kel', // Local key on the mechanics table...
            // 'Kd_Kec' // Local key on the cars table...
        // );
    }
}

