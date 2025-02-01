@extends('layouts.backend.base')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>PPDB</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>PPDB</h4>

                                    <a href="{{ route('admin.waktu-pendaftaran.create') }}" class="btn btn-primary ">
                                        <i class="fa fa-plus"></i>
                                        Tambah
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>Keterangan PPDB</th>
                                                <th class="text-center">Waktu</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($waktuPendaftaran as $item)
                                                <tr>
                                                    <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                    <td class="">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="">
                                                        {{ $item->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($item->startDate)->translatedFormat('d F Y') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($item->endDate)->translatedFormat('d F Y') }}
                                                    </td>
                                                    @if ($item->status == 'Aktif')
                                                        <td><span class="badge bg-success text-light">Aktif</span></td>
                                                    @else
                                                        <td><span class="badge bg-warning text-light">Non Aktif</span></td>
                                                    @endif

                                                    <td class="align-middle">
                                                        <a href="{{ route('admin.waktu-pendaftaran.edit', $item->id) }}"
                                                            class="btn btn-sm btn-outline-primary" title="edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <button
                                                            class="btn btn-sm btn-{{ $item->status == 'Aktif' ? 'danger' : 'success' }}  status mr-1"
                                                            data-url="{{ route('admin.status-waktu-pendaftaran', $item->id) }}"
                                                            data-status={{ $item->status }} title="{{ $item->status == 'Aktif' ? 'Non-Aktifkan Waktu Pendaftaran' : 'Aktifkan Waktu Pendaftaran' }}">
                                                            <i class="fas fa-{{ $item->status == 'Aktif' ? 'toggle-off' : 'toggle-on' }}"></i>
                                                        </button>

                                                        <button
                                                            data-url="{{ route('admin.waktu-pendaftaran.destroy', $item->id) }}"
                                                            class="btn btn-sm btn-outline-danger delete"> <i
                                                                class="fas fa-trash"></i>
                                                        </button>
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

            let title = status == 'Aktif' ? 'Non-Aktifkan Status PPDB ?' : 'Aktifkan Status PPDB ?';

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
