<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsalSekolah extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the registrasiSiswa that owns the AsalSekolah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function registrasiSiswa(): BelongsTo
    {
        return $this->belongsTo(RegistrasiSiswa::class);
    }
}
