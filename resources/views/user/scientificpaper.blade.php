@extends('layouts.frontend.base')
@section('content')
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Karya Ilmiah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Karya Ilmiah</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Karya Ilmiah </h6>
        </div>
        <form action="#" class="form-horizontal"
            style="padding-bottom: 10px;border-bottom: 1px solid #d7d6d6; margin-bottom: 20px;">
            <div class="row align-items-center">
                <div class="col-md-12 col-sm-12">
                    <label for="" class="label-control">
                        Judul
                    </label>

                    <form action="{{ route('karya-ilmiah-landing-page') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari...">
                            {{-- <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Cari</button>
                            </span> --}}
                            <div class="col-md-1 col-sm-12 d-flex mt-auto">
                                <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="col-md-1 col-sm-12 d-flex mt-auto">
                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="bi bi-search"></i></button>
                </div> --}}

            </div>
        </form>
        <div id="pdfViewer"></div>
        @forelse ($scientificpaper as $item)
            <div class="row g-4 ">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item">
                        <div class="mb-3">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="">
                                            <h5 class="card-title">{{ $item->title }}</h5>
                                        </a>
                                        <p class="card-text text-justify">
                                            Tahun {{ ($item->year) }}
                                        </p>
                                        <p class="card-text text-justify">
                                            <a href="{{ asset('/storage/public/file/scientificpaper/' . $item->file) }}" onclick="displayPDF('{{ asset('/storage/public/file/scientificpaper/' . $item->file) }}'); return false;">
                                                {{ $item->title }}
                                            </a>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
            </div>
            <div class="text-center">
                Belum Ada Data Karya Ilmiah
            </div>
        @endforelse
        <div class="text-center">
            <nav class="d-inline-block">
                <div class="p-2">
                    {{ $scientificpaper->onEachSide(5)->links() }}
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('script')
// Fungsi untuk menampilkan PDF
function displayPDF(pdfUrl) {
    const pdfViewer = document.getElementById('pdfViewer');

    // Tentukan URL untuk file PDF
    const pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.368/pdf.worker.min.js';

    // Muat PDF
    pdfjsLib.getDocument(pdfUrl).promise
        .then(pdfDoc => {
            // Mulai dari halaman pertama
            return pdfDoc.getPage(1);
        })
        .then(page => {
            // Setel skala halaman
            const viewport = page.getViewport({ scale: 1 });
            pdfViewer.innerHTML = ''; // Hapus konten sebelumnya
            pdfViewer.appendChild(page.getViewport({ scale: 1 }).canvas);
        })
        .catch(error => {
            console.error('Error displaying PDF:', error);
        });
}

@endsection