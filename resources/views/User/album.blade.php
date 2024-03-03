@include ('User.layout.header')

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Album Foto</h5>
                <form action="/create_album" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Judul Foto</label>
                        <input type="text" name="judul_album" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea name="judul_deskripsi" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Buat</button>
                </form>
                <div class="mt-3">
                </div>
            </div>
        </div>
    </div>
</div>

@include ('User.layout.footer')