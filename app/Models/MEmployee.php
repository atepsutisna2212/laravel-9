<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MEmployee extends Model
{
    use HasFactory;

    protected $table = 'tb_karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $guard = 'id_karyawan';
    public $timestamps = false;
    protected $fillable = [
        'nama_karyawan',
        'nip',
        'jabatan',
        'alamat',
        'telp',
        'email',
        'foto',
        'created_by',
        'created_at'
    ];

    // protected $dates = [
    //     'created_at'
    // ];
}
