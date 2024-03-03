@include('User.layout.header')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h5 class="section-title px-3">Explore</h5>
            <h1 class="mb-4">Cari Foto</h1>
            <p class="mb-0">Jelajahi keindahan dalam setiap foto! Mari kita temukan cerita di balik setiap gambar. Yuk, kita eksplorasi dunia melalui lensa!</p>
            <form action="/cari" method="get">
                <div class="narrow-w form-search d-flex align-items-stretch mb-3 mt-4">
                    <input type="search" class="form-control px-4" name="search" placeholder="Cari Foto">
                    <button type="submit" class="btn btn-primary">Search</button> 
                </div>
            </form>
        </div>
</section>

<div class="container-fluid gallery">
    <div class="tab-class text-center">
        <ul class="nav nav-pills d-flex justify-content-center mb-5">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#GalleryTab-1">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#GalleryTab-2">Anime</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#GalleryTab-3">Animal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#GalleryTab-4">Sport</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="GalleryTab-1" class="tab-pane fade show p-0 active mt-1">
                <div class="row g-2">
                @foreach($posts as $post)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="gallery-item h-100">
                            <a href="{{ asset('foto/' . $post->foto) }}">
                            <img src="{{ asset('foto/' . $post->foto) }}" class="img-fluid w-100 h-100 rounded" alt="Image">
                            <div class="gallery-content">
                                <div class="gallery-info">
                                    <h5 class="text-white text-uppercase mb-2">{{ $post->judul }}</h5>
                                    <a href="/view/{{ $post->id }}" class="btn-hover text-white">Detail <i class="fa fa-arrow-right ms-2"></i></a>
                                    <div class="iicon">
                                        <i class="bi bi-heart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-plus-icon">
                                <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                            
@include('User.layout.footer')
