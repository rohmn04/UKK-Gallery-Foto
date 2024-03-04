@include('User.layout.header')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h5 class="section-title px-3">Home</h5>
            <h1 class="mb-4">Postingan Anda</h1>
            <p class="mb-0">Selamat datang! Temukan keindahan dalam setiap foto. Jelajahi beragam setiap foto dan nikmati cerita di setiap gambar!</p>

        </div>
</section>

<div class="container-fluid gallery">
    <div class="tab-class text-center">
        <div class="tab-content">
            <div id="GalleryTab-1" class="tab-pane fade show p-0 active mt-0">
                <div class="row g-2">
                @foreach($posts as $post)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="gallery-item h-100">
                            <a href="{{ asset('foto/' . $post->foto) }}">
                            <img src="{{ asset('foto/' . $post->foto) }}" class="img-fluid w-100 h-100 rounded" alt="Image">
                            <div class="gallery-content">
                                <div class="gallery-info">
                                    <h5 class="text-white text-uppercase mb-2">{{ $post->judul }}</h5>
                                    <a href="/view/{{ $post->id }}" class="btn-hover text-white">Detail</a>
                                    <form action="/likefoto" method="post">
                                    @csrf
                                        <input type="hidden" name="id_foto" value="{{ $post->id }}">
                                        <!-- option dan like button -->
                                        <div class="d-flex justify-content-between">
                                        <!-- option edit hapus -->
                                    <div>
                                                
                                            <div class="dropdown">
                                            <a  class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-list"></i>
                                            </a>
                                        <ul class="dropdown-menu hapus text-small">
                                            <li><a class="dropdown-item" href="/ubahfoto/{{$post->id}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="/hapusfoto/{{$post->id}}"><i class="bi bi-trash"></i> Hapus</a></li>
                                        </ul>
                                        </div>
                                        
                                    </div>
                                    <!-- End option edit hapus -->

                                        <!-- Button like -->
                                        <div>
                                            <button class="icon" type="submit">
                                             <i class="bi bi-heart"></i>
                                            </button>
                                        </div>
                                        <!-- End Button like -->

                                        </div>
                                        <!-- End option dan like button -->

                                        
                                        
                            
                                    </form>
                                </div>
                            </div>
                        <div class="gallery-plus-icon">
                            <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                        </div>
                        </div>
                    </div>
                @endforeach

                    
@include('User.layout.footer')