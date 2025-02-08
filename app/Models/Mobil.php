<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='mobils';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'user_id',
        'nopolisi',
        'slug',
        'merk',
        'jenis',
        'kursi',
        'harga',
        'foto',
        'mesin',
        'status',
        'bbm'
    ];
    // Model Mobil.php
    public function getRouteKeyName()
    {
        return 'slug'; // Pastikan ini mengarah ke kolom slug di database
    }
    public function transaksi() : HasMany {
        return $this->hasMany(Transaksi::class);
        
    }
    
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
