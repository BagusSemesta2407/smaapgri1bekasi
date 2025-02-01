@extends('layouts.backend.base')

@section('styles')
    <style>
        /* Hanya menargetkan tombol export dan print pada DataTables */
        .dt-buttons .dt-export-btn {
            background-color: #007bff !important; /* Warna biru Bootstrap */
            color: white !important;
            border-radius: 5px;
            border: none;
            padding: 6px 12px;
            margin-right: 5px;
            font-size: 12px;
            transition: background-color 0.3s ease-in-out;
        }

        /* Efek hover untuk tombol export dan print */
        .dt-buttons .dt-export-btn:hover {
            background-color: #0056b3 !important; /* Biru lebih gelap */
            color: white !important;
        }

        /* Mengatur margin bawah untuk tombol agar tidak terlalu berdekatan dengan tabel */
        .dt-buttons .dt-export-btn {
            margin-bottom: 5px;
        }
    </style>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pendaftar</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>Pendaftar</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NISN</th>
                                                <th>No KK</th>
                                                <th>NIK</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                                <th>No WA</th>
                                                <th>Telepon</th>
                                                <th>Status Pendaftar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($registrasiSiswa as $item)
                                                <tr>
                                                    <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->nisn }}</td>
                                                    <td>{{ $item->no_kk }}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->no_hp }}</td>
                                                    <td>{{ $item->no_wa }}</td>
                                                    <td>{{ $item->telepon }}</td>
                                                    <td>{{ $item->status_pendaftar }}</td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('admin.registrasi-siswa.edit', $item->id) }}"
                                                            class="btn btn-sm btn-outline-primary" title="edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#myTable')) {
                $('#myTable').DataTable().destroy();
            }

            $('#myTable').DataTable({
                dom: 'lBfrtip', // 'l' untuk show entries, 'B' untuk tombol export
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'dt-export-btn'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        className: 'dt-export-btn'
                    }
                ]
            });
        });
    </script>
@endsection
