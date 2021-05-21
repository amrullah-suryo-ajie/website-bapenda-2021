<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wajibPajak extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    protected $table = 'wajib_pajak';
    // protected $table = 'ta_wajib_pajak';
    // protected $primaryKey = 'NPWP_Gab';
    // public $incrementing = false;
    // protected $keyType = 'string';
    // public function taWajibPajakUsaha()
    // {
    //     return $this->hasMany(wajibPajakUsaha::class, 'No_Pokok_WP', 'NPWP_Gab');
    // }
    // public function taWajibPajakUsahaBaru()
    // {
    //     return $this->belongsTo(wajibPajakUsaha::class, 'NPWP_Gab', 'No_Pokok_WP');
    // }
    public function kecamatan()
    {
        return $this->hasOne(kecamatan::class, 'Kd_Kec', 'Kd_Kec');
    }
    public function kelurahan()
    {
        return $this->belongsTo(kelurahan::class, 'Kd_Kel', 'Kd_Kel');
    }
}
