@include('User.layout.header')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
        <img src="foto_profile/{{ $name->foto_profile }}" alt="" class="rounded-circle" width="300px">
        <h1 class="fw-light">{{ $name->nama_lengkap }}</h1>
        <p class="lead text-body-secondary">{{ $name->bio }}</p>
        <p>
            <a href="#editprofile" class="btn btn-primary scrollto my-2">Edit Profile</a>       
        </p>
        <section id="editprofile">
        </div>
    </div>
</section>

<div class="container ubahprofile">
    <div class="row"> 
        <div class="col-lg-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Ubah Password</button>
                </li>
            </ul>
            <div class="tab-content" id="editprofile">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <form action="/profileedit" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form form-group col-md-6">
                            <div class="input-group my-3">
                                <input type="file" name="foto_profile" class="form-control" required>
                                <input type="hidden" name="profile_lama">   
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" name="new_nama" class="form-control" required>
                                <label for="textNama">Nama</label>
                            </div>  
                            <div class="form-floating my-3">
                                <input type="text" name="new_alamat" class="form-control" required>
                                <label>Alamat</label>
                            </div>
                            <div class="form-floating my-3">
                                <input type="date" name="new_tgl_lahir" class="form-control"required>
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" name="new_bio" class="form-control" required>
                                <label>Bio</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary position-relative">Perbaharui</button>
                        </div>
                        </form>
                    </div>
                </div>
                <form action="/changepassword" method="post">
                @csrf
                    <div class="tab-pane fade" id="profile">
                        <div class="form-floating my-3">
                            <input type="password" name="old_password" class="form-control" required>
                            <label>Password Lama</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="password" name="new_password" class="form-control" required>
                            <label>Password Baru</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="password" name="repeat_password" class="form-control" required>
                            <label>Konfirmasi Password</label>
                        </div>
                        <div class="form-floating my-3">
                            <button type="submit" class="btn btn-primary btn-md">Perbaharui Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        
@include('User.layout.footer')