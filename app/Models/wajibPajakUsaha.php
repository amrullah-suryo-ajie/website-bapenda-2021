<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wajibPajakUsaha extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    protected $table = 'ta_wajib_pajak_usaha';
    protected $primaryKey = 'No_Pokok_WP';
    public $incrementing = false;
    protected $keyType = 'string';
    public function taWajibPajak()
    {
        return $this->belongsTo(wajibPajak::class, 'No_Pokok_WP', 'NPWP_Gab');
    }
    
}
