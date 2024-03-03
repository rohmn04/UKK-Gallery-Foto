@include ('User.layout.header')

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Foto</h5>
                <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" name="foto" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Judul Foto</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required></textarea>
                </div>
                <div class="form form-group mb-3">
                    <label for="selectKategoriPengaduan">Pilih Kategori</label>
                    <select type="text" name="idkategori" class="form form-control">
                        <option value="">-- Masukkan Kategori --</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach           
                    </select>
                </div>
                <div class="form form-group mb-3">
                    <label for="selectKategoriPengaduan">Pilih Album</label>
                    <select type="text" name="idalbum" class="form form-control">
                    <option value="">-- Masukkan Album --</option>
                    @foreach($album as $item)
                    <option value="{{ $item->id }}">{{ $item->judul_album }}</option>
                    @endforeach           
                    </select>
                </div>
                    <button class="btn btn-primary" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include ('User.layout.footer')
