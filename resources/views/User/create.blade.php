@include('User.layout.header')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h5 class="section-title px-3">Create</h5>
            <h1 class="mb-4">Upload & Buat Album</h1>
            <p class="mb-0">Selamat datang! Temukan keindahan dalam setiap foto. Jelajahi beragam setiap foto dan nikmati cerita di setiap gambar!</p>
            <div class="text-center align-items-stretch mb-3 mt-4">
                <p>
                <a href="/fotocreate" class="btn btn-primary my-2">Upload Foto</a>
                <a href="/album" class="btn btn-secondary my-2">Buat Album</a>
                </p>
            </div>
        </div>
</section>

<div class="container-fluid gallery">
    <div class="tab-class text-center">
        <div class="tab-content">
            <div id="GalleryTab-1" class="tab-pane fade show p-0 active mt-0">
                <div class="row g-2">
                    <div class="container-fluid ExploreTour py-5">
                        <div class="container py-5">
                            <div class="tab-class text-center">
                                <div class="tab-content">
                                    <div id="NationalTab-1" class="tab-pane fade show p-0 active">
                                        <div class="row g-4">
                                            <!-- start content -->
                                            @foreach($album as $album_foto)
                                            <div class="col-md-6 col-lg-4">
                                                <div class="national-item">
                                                    <img src="../assets/img/album.jpg" class="img-fluid w-100 rounded" alt="Image">
                                                    <div class="national-content">
                                                        <div class="national-info">
                                                            <div>
                                                            <h5 class="text-white text-uppercase mb-2">{{ $album_foto->judul_album }}</h5>
                                                            <a href="/viewAlbum/{{ $album_foto->id }}" class="btn-hover text-white">Lihat<i class="fa fa-arrow-right ms-2"></i></a>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a  class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></a><ul class="dropdown-menu hapus text-small"><li><a class="dropdown-item" href="/editalbum/{{$album_foto->id}}"><i class="bi bi-pencil-square"></i> Edit</a></li><li><a class="dropdown-item" href="/hapusalbum/{{$album_foto->id}}"><i class="bi bi-trash"></i> Hapus</a></li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="national-plus-icon">
                                                        <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- end content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
            
@include('User.layout.footer')