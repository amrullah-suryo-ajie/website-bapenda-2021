<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class calonWP extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    protected $table = 'calon_wp';
    // protected $primaryKey = 'No_Pokok_WP';
    public $incrementing = false;
    // protected $keyType = 'string';
    protected $casts = [
        // 'Tgl_Izin' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];
    
    
    // public function taWajibPajak()
    // {
    //     return $this->belongsTo(wajibPajak::class, 'No_Pokok_WP', 'NPWP_Gab');
    // }
    public function kecamatan()
    {
        return $this->hasOne(kecamatan::class, 'Kd_Kec', 'Kd_Kec');
    }
    public function kelurahan()
    {
        return $this->hasMany(kelurahan::class, 'Kd_Kec', 'Kd_Kec');
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
    // public function getTglIzinAttribute()
    // {
    //     return Carbon::parse($this->attributes['Tgl_Izin'])->translatedFormat('d F Y');
    // }
}
