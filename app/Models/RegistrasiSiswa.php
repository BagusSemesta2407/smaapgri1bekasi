<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class RegistrasiSiswa extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['bukti_pembayaran'];

    /**
     * Save image bukti pembayaran.
     *
     * @param  $request
     * @return string
     */
    public static function saveBuktiPembayaran($request)
    {
        $filename = null;

        if ($request->bukti_pembayaran) {
            $file = $request->bukti_pembayaran;

            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . uniqid() . '.' . $ext;
            $file->storeAs('public/image/registrasi-siswa/bukti-pembayaran/', $filename);
        }

        return $filename;
    }

    /**
     * Get the image bukti pembayaran.
     *
     * @return string
     */
    public function getBuktiPembayaranUrlAttribute()
    {
        if ($this->bukti_pembayaran) {
            return asset('storage/public/image/registrasi-siswa/bukti-pembayaran/' . $this->bukti_pembayaran);
        }

        return null;
    }

    /**
     * Delete image.
     *
     * @param  $id
     * @return void
     */
    public static function deleteBuktiPembayaran($id)
    {
        $registrasiSiswa = RegistrasiSiswa::firstWhere('id', $id);
        if ($registrasiSiswa->bukti_pembayaran != null) {
            $path = 'public/image/registrasi-siswa/bukti-pembyaran/' . $registrasiSiswa->bukti_pembayaran;
            if (Storage::exists($path)) {
                Storage::delete('public/image/registrasi-siswa/bukti-pembyaran/' . $registrasiSiswa->bukti_pembayaran);
            }
        }
    }

    /**
     * Get the waktuPendaftaran that owns the RegistrasiSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function waktuPendaftaran(): BelongsTo
    {
        return $this->belongsTo(WaktuPendaftaran::class);
    }

    /**
     * Get all of the tempatTinggal for the RegistrasiSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tempatTinggal(): HasMany
    {
        return $this->hasMany(TempatTinggal::class);
    }

    /**
     * Get all of the kesehatan for the RegistrasiSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kesehatan(): HasMany
    {
        return $this->hasMany(Kesehatan::class);
    }

    /**
     * Get all of the asalSekolah for the RegistrasiSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asalSekolah(): HasMany
    {
        return $this->hasMany(AsalSekolah::class);
    }
}
