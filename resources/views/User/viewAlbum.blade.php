@include('User.layout.header')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h5 class="section-title px-3">Lihat Album</h5>
            <h1 class="mb-4">{{ $view->judul_album }}</h1>
            <p class="mb-0">{{ $view->deskripsi_album }}</p>
            <div class="narrow-w form-search d-flex align-items-stretch mb-3 mt-4">
            </div>
        </div>
</section>

<div class="container-fluid gallery">
    <div class="tab-class text-center">
        <div class="tab-content">
            <div id="GalleryTab-1" class="tab-pane fade show p-0 active mt-0">
                <div class="row g-2">
                @foreach($albumview as $item)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="gallery-item h-100">
                            <a href="{{ asset('foto/'.$item->foto )}}">
                            <img src="{{ asset('foto/'.$item->foto) }}" class="img-fluid w-100 h-100 rounded" alt="Image">
                            <div class="gallery-content">
                                <div class="gallery-info">
                                    <h5 class="text-white text-uppercase mb-2">{{ $item->judul }}</h5>
                                    <a href="" class="btn-hover text-white">Detail <i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="gallery-plus-icon">
                                <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                            </div>
                        </div>
                @endforeach                                        
                    
@include('User.layout.footer')