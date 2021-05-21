<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    protected $table = 'ref_kecamatan';
    protected $primaryKey = 'Kd_Kec';
    public $incrementing = false;
    protected $keyType = 'string';
    public function kecamatanCalonWP()
    {
        return $this->belongsTo(calonWP::class);
    }
    public function kecamatanWP()
    {
        return $this->belongsTo(wajibPajak::class);
    }
}
