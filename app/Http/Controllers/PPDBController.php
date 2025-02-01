<?php

namespace App\Http\Controllers;

use App\Models\RegistrasiSiswa;
use App\Models\Setting;
use App\Models\TempatTinggal;
use App\Models\WaktuPendaftaran;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PPDBController extends Controller
{
    //landing page

    public function index()
    {
        $waktuPendaftaran = WaktuPendaftaran::where('status', 'Aktif')->get();
        return view('ppdb.index', [
            'waktuPendaftaran' => $waktuPendaftaran,
        ]);
    }

    public function registrasi($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $waktuPendaftaran = WaktuPendaftaran::find($id);
        $setting = Setting::first();
        return view('ppdb.registrasi', [
            'waktuPendaftaran' => $waktuPendaftaran,
            'setting' => $setting,
        ]);
    }

    /**
     * Proses registrasi
     *
     **/
    public function postRegistrasi(Request $request, $id)
    {
        $buktiPembayaran = RegistrasiSiswa::saveBuktiPembayaran($request);
        // Buat registrasi siswa
        $registrasiSiswa = RegistrasiSiswa::create(array_merge($request->all(), [
            'waktu_pendaftaran_id' => $id,
            'status_pendaftar' => 'Pendaftar',
            'bukti_pembayaran' => $buktiPembayaran,
            'status_pembayaran' => 'Menunggu Konfirmasi'
        ]));

        // Buat tempat tinggal siswa
        $tempatTinggal = TempatTinggal::create(array_merge($request->all(), ['registrasi_siswa_id' => $registrasiSiswa->id]));
        
        return redirect()->route('ppdb')->with('success', 'Data anda berhasil disimpan!');
    }
}
