@include ('User.layout.header')

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit</h5>
                <form action="/editalbum/{{ $album->id }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Foto</label>
                        <input type="text" name="judul_baru" class="form-control" value="{{ $album->judul_album }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi_baru" class="form-control">{{ $album->deskripsi_album}}</textarea>
                    </div>
                    <input type="submit" name="" value="Update" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
</div>

@include ('User.layout.footer')
