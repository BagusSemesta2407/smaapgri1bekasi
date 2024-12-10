@extends('layouts.frontend.base')
@section('content')
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Registrasi</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">PPDB</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">PPDB</h6>
            </div>
            <form enctype="multipart/form-data" id="myForm" method="POST" action="{{ route('post-registrasi', $waktuPendaftaran->id) }}" >
                @csrf
                <h4>Keterangan Pribadi</h4>
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <small>(Sesuai dengan Akte Kelahiran, Kartu Keluarga, dan Ijazah SMP/MTS)</small>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" style="text-transform: uppercase">
                </div>
                
                <div class="form-group mt-2">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="number" class="form-control" name="nisn" id="nisn" placeholder="MASUKKAN NISN">
                </div>
                <div class="form-group mt-2">
                    <label for="no_kk" class="form-label">No. KK </label>
                    <small>(No. Kartu Keluarga)</small>
                    <input type="number" class="form-control" name="no_kk" id="no_kk" placeholder="MASUKKAN NO. KK">
                </div>
                <div class="form-group mt-2">
                    <label for="nik" class="form-label">NIK </label>
                    <small>(No. Induk Kependukan)</small>
                    <input type="number" class="form-control" name="nik" id="nik" placeholder="MASUKKAN KK">
                </div>
                <div class="form-group mt-2">
                    <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                    <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Masukkan Nama Panggilan" style="text-transform:uppercase">
                </div>
                <div class="form-group mt-2">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" style="text-transform: uppercase">
                </div>
                <div class="form-group mt-2">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir">
                </div>
                <div class="form-group mt-2">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-select" id="agama" name="agama">
                        <option value="" disabled selected>Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                    <select class="form-select" id="kewarganegaraan" name="kewarganegaraan">
                        <option value="" disabled selected>Pilih Kewarganegaraan</option>
                        <option value="Indonesia Asli">Indonesia Asli</option>
                        <option value="WNI Keturunan">WNI Keturunan</option>
                        <option value="Asing">Asing</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="anak_ke" class="form-label">Anak Ke-</label>
                    <input type="number" class="form-control" name="anak_ke" id="anak_ke" placeholder="MASUKKAN ANAK KE-">
                </div>
                <div class="form-group mt-2">
                    <label for="jumlah_saudara_kandung" class="form-label">Jumlah Saudara Kandung</label>
                    <input type="number" class="form-control" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung"
                        placeholder="MASUKKAN JUMLAH SAUDARA KANDUNG">
                </div>
                <div class="form-group mt-2">
                    <label for="jumlah_saudara_tiri" class="form-label">Jumlah Saudara Tiri</label>
                    <input type="number" class="form-control" id="jumlah_saudara_tiri" name="jumlah_saudara_tiri"
                        placeholder="Masukkan Jumlah Saudara Tiri">
                </div>

                <div class="form-group mt-2">
                    <label for="status_anak" class="form-label">Anak Yatim / Piatu / Yatim Piatu</label>
                    <select class="form-select" id="status_anak" name="status_anak">
                        <option value="" disabled selected>Pilih Kategori Anak</option>
                        <option value="Yatim">Yatim</option>
                        <option value="Piatu">Piatu</option>
                        <option value="Yatim Piatu">Yatim Piatu</option>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="bahasa" class="form-label">Bahasa Sehari Hari di Rumah</label>
                    <input type="text" class="form-control" id="bahasa" name="bahasa"
                        placeholder="Masukkan Bahasa Sehari Hari di Rumah" style="text-transform: uppercase">
                </div>
                <div class="form-group mt-2">
                    <label for="parties_contaced" class="form-label">Pihak Yang Bisa Dihubungi</label>
                    <input type="text" class="form-control" id="parties_contaced" name="parties_contaced"
                        placeholder="Masukkan Pihak Yang Bisa Dihubungi" style="text-transform: uppercase">
                </div>
                <div class="form-group mt-2">
                    <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab"
                        placeholder="Masukkan Penanggung Jawab" style="text-transform: uppercase">
                </div>
                <div class="form-group mt-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan Email">
                </div>
                <div class="form-group mt-2">
                    <label for="no_hp" class="form-label">Hp</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp"
                        placeholder="Masukkan Hp">
                </div>
                <div class="form-group mt-2">
                    <label for="no_wa" class="form-label">Whatsapp</label>
                    <input type="number" class="form-control" id="no_wa" name="no_wa"
                        placeholder="Masukkan Whatsapp">
                </div>
                <div class="form-group mt-2">
                    <label for="telepon" class="form-label">Telepon Rumah</label>
                    <small>(Jika ada)</small>
                    <input type="number" class="form-control" id="telepon" name="telepon"
                        placeholder="Masukkan Telepon Rumah">
                </div>
                
                <h4 class="mt-3">Keterangan Tempat Tinggal</h4>
                <div class="form-group mt-2">
                    <label for="alamat_lengkap" class="form-label">Alamat</label>
                    <textarea name="alamat_lengkap" class="form-control" id="alamat_lengkap"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="number" class="form-control" id="kode_pos" name="kode_pos"
                        placeholder="Masukkan Titik Koodinat">
                </div>
                <div class="form-group mt-2">
                    <label for="titik_koodinat" class="form-label">Titik Koodinat</label>
                    <input type="text" class="form-control" id="titik_koodinat" name="titik_koodinat"
                        placeholder="Masukkan Titik Koodinat">
                </div>
                <div class="form-group mt-2">
                    <label for="tempat_tinggal_pada" class="form-label">Tempat Tinggal Pada</label>
                    <select name="tempat_tinggal_pada" class="form-select" id="tempat_tinggal_pada">
                        <option value="" disabled selected>Pilih Tempat Tinggal</option>
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Menumpang Saudara">Menumpang Saudara</option>
                        <option value="Orang Lain">Orang Lain</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="jarak" class="form-label">Jarak Tempat Tinggal</label>
                    <input type="number" class="form-control" id="jarak" name="jarak"
                        placeholder="Masukkan Jarak Tempat Tinggal">
                </div>

                <div class="form-group mt-2">
                    <label for="transportasi" class="form-label">Transportasi Ke Sekolah</label>
                    <select name="transportasi" class="form-select" id="transportasi">
                        <option value="" disabled selected>Pilih TTransportasi</option>
                        <option value="Pribadi">Pribadi</option>
                        <option value="Umum">Umum</option>
                        <option value="Jalan Kaki">Jalan Kaki</option>
                        <option value="Sepeda Motor Pribadi">Sepeda Motor Pribadi</option>
                    </select>
                </div>
                

                <h4 class="mt-3">Keterangan Kesehatan</h4>
                <div class="row d-flex">
                    <div class="form-group col-md-4">
                        <label for="berat_badan" class="form-label">Berat Badan</label>
                        <input type="number" class="form-control" id="berat_badan" name="berat_badan"
                            placeholder="Masukkan Berat Badan (Kg)">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                        <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan"
                            placeholder="Masukkan Tinggi Badan (Cm)">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gol_darah" class="form-label">Gol. Darah</label>
                        <select name="gol_darah" id="gol_darah" class="form-select">
                            <option value="" disabled selected>Pilih Gol. Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                            <option value="AB">AB</option>
                        </select>
                    </div>
                </div>
                <div class="row d-flex mt-1">
                    <div class="form-group col-md-4">
                        <label for="penyakit_yang_diderita" class="form-label">Penyakit Yang Pernah Diderita</label>
                        <input type="number" class="form-control" id="penyakit_yang_diderita" name="penyakit_yang_diderita"
                            placeholder="Masukkan Penyakit Yang Pernah Diderita">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                        placeholder="Upload Bukti Pembayaran">
                    <small class="text-danger">Biaya Pendaftaran PPDB di bayarkan ke Nomor Berikut <p style="font-weight:bold;">({{ @$setting->tipe_pembayaran }}) {{ @$setting->nomor_rekening }} </p></small>
                    <div class="col-12 mt-2">
                        <img id="preview-image-before-upload" src="{{ @$user->image_url }}"
                                                        alt="" style="max-height: 250px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3" id="btnSubmit">Submit</button>
            </form>
        </div>
    </div> 
@endsection
@section('lp-script')
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#bukti_pembayaran').change(function() {
                let file = this.files[0];
                let fileType = file.type.toLowerCase();
                let allowedExtensions = ["image/jpg", "image/jpeg", "image/png"];

                if (allowedExtensions.indexOf(fileType) === -1) {
                    alert("Hanya file JPG, JPEG, PNG yang diperbolehkan.");
                    $('#bukti_pembayaran').val(''); // Mengosongkan input file
                    return false;
                }

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);

            });

        });
    </script>
@endsection