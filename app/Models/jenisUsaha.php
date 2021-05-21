<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisUsaha extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    protected $table = 'ref_jenis_usaha';
    protected $primaryKey = 'Jn_Usaha_WP';
    public $incrementing = false;
    protected $keyType = 'string';
}
