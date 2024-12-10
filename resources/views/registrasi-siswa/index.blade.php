@extends('layouts.backend.base')

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.delete', function() {
                let url = $(this).val();
                console.log(url);
                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Tag ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "DELETE",
                                url: url,
                                dataType: 'json',
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    })
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.status', function() {
            let url = $(this).data('url');
            let status = $(this).data('status');

            let title = status == 'Aktif' ? 'Aktifkan Status PPDB ?' : 'Non-Aktifkan Status PPDB?';

            let icon = status == 'Aktif' ? 'error' : 'info';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            Swal.fire({
                title: title,
                text: "Status PPDB Akan Diganti",
                icon: icon,
                showCancelButton: true
            }).then((action) => {
                if (action.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: url,
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire('Berhasi!', 'Status PPDB Berhasil Diubah!', 'success')
                                .then(
                                    function() {
                                        location.reload();
                                    })
                        },
                        error: function(data) {
                            console.log('Error :' + data);
                        }
                    })
                }
            });
        })
    </script>
@endsection
