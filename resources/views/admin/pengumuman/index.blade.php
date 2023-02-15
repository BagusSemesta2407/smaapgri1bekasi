@extends('layouts.backend.base')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengumuman</h1>


            </div>

            <div class="section-body">
                <h2 class="section-title">DataTables</h2>
                <p class="section-lead">
                    We use 'DataTables' made by @SpryMedia. You can check the full documentation <a
                        href="https://datatables.net/">here</a>.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>Basic DataTables</h4>

                                    <a href="{{ route('admin.announcement.create') }}" class="btn btn-primary ">
                                        <i class="fa fa-plus"></i>
                                        Tambah
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>Kategori Artikel</th>
                                                <th>Judul</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($article as $item)
                                                <tr>
                                                    <td class="">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="">
                                                        {{ $item->categoryArticle->name }}
                                                    </td>
                                                    <td class="">
                                                        {{ $item->title }}
                                                    </td>
                                                    
                                                    <td class=" align-middle">
                                                        <a href="{{ route('admin.article.edit', $item->id) }}"
                                                            class="btn btn-sm btn-outline-primary" title="edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <button class="btn btn-sm btn-outline-danger delete"
                                                            value="{{ route('admin.article.destroy', $item->id) }}"
                                                            title="Hapus">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
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

        $(document).on('click', '.delete', function() {
            let url = $(this).val();

            deleteSwal(url)
        });
    </script>
@endsection
