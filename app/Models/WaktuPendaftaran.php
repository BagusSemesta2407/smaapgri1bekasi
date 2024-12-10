<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WaktuPendaftaran extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The accessors to attributes to the model's array form.
     *
     * @var array
     * value default
     */
    protected $attributes = ['status' => 'Non Aktif'];
    
    /**
     * Get all of the registrasiSiswa for the WaktuPendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrasiSiswa(): HasMany
    {
        return $this->hasMany(RegistrasiSiswa::class);
    }
}
