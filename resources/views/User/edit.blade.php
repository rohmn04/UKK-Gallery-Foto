@include ('User.layout.header')

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul Foto</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" id="exampleInputPassword1"></textarea>
                        <input type="hidden" name="tanggal" class="form-control" id="exampleInputPassword1" value="">
                        <input type="hidden" name="user" class="form-control" id="exampleInputPassword1" value="">
                    </div>
                    <input type="submit" name="" value="Update" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
</div>

@include ('User.layout.footer')
