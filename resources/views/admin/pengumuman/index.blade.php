@extends('layouts.backend.base')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengumuman</h1>


            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>Data Pengumuman</h4>

                                    <a href="{{ route('admin.announcement.create') }}" class="btn btn-primary ">
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
                                                <th>Uraian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($announcement as $item)
                                                <tr>
                                                    <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                    <td class="">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="">
                                                        {{ $item->title }}
                                                    </td>

                                                    <td class=" align-middle">
                                                        <a href="{{ route('admin.announcement.edit', Crypt::encryptString($item->id)) }}"
                                                            class="btn btn-sm btn-outline-primary" title="edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <button class="btn btn-sm btn-danger delete"
                                                            data-url="{{ route('admin.announcement.destroy', $item->id) }}"
                                                            title="Delete">
                                                            <i class="fas fa-trash"></i>
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
@endsection
