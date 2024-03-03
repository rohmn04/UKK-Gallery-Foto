@include('User.layout.header')
                                
<div class="container-fluid destination py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Detail</h5>
            <h1 class="mb-0">{{ $detail->judul }}</h1>
        </div>
        <div class="tab-class text-center">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-xl-8">
                            </div>
                        <!-- start konten -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="destination-img h-100">
                                            <a href="{{ asset('foto/'.$detail->foto) }}">
                                            <img class="img-fluid rounded w-100 h-100" src="{{ asset('foto/'.$detail->foto) }}" style="object-fit: cover; min-height: 430px;" alt="">
                                            </a>
                                            <div class="destination-overlay p-4">
                                                <img src="{{ asset('foto_profile/'.$user->foto_profile) }}" class="img rounded-circle" width="40px" alt="">
                                                <h4 class="text-white mb-2 mt-3">{{ $user->nama_lengkap }}</h4>
                                            </div>
                                            <div class="search-icon">
                                                <a href="img/destination-9.jpg" data-lightbox="destination-4"><i class=""></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <!-- komentar -->
                                    <div class="col-sm-2">
                                        <div class="scrollkomen1">
                                            <div class="scrollkomen2">
                                                <div class="description">
                                                @foreach($komen as $item)
                                                    <div class="col-md-20">
                                                        <div class="mt-3 mb-2">            
                                                            <img src="{{ asset('foto_profile/'.$item->user->foto_profile )}}" class="img rounded-circle" width="40px" alt="">
                                                            <span class="text-xl mx-2">{{ $item->user->nama_lengkap }}</span>
                                                        </div>
                                                        <div class="text-small">
                                                            <p>{{ $item->isi_komentar }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                            <form action="/addkomentar" method="post">
                                            @csrf
                                                <div class="flex d-flex">
                                                    <input type="hidden" name="id_foto" value="{{ $detail->id}}">
                                                    <input type="text" name="isi_komentar"  placeholder="Tambahkan komentar">
                                                    <button class="btn btn-primary" type="submit">Kirim</button>
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-xl-4">
                                        <div class="description">
                                            <p style="text-align: justify;"> {{ $detail->deskripsi }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end konten -->
                            </div>
                    </div>
                </div>
            </div>

@include('User.layout.footer')