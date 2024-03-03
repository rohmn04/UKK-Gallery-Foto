var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        paginate++;
        loadMoreData(paginate);
    }
})

function loadMoreData(paginate){
    $.ajax({
        url: window.location.origin +'/getDataExplore/'+ '?page='+paginate,
        type: "GET",
        dataType: "JSON",
        success: function(e){
            console.log(e)
            e.data.data.map((x)=>{
                var hasilPencarian = x.likefoto.filter(function(hasil){
                    return hasil.user_id === e.idUser
                })
                if(hasilPencarian.length <= 0){
                    userlike = 0;
                } else {
                    userlike = hasilPencarian[0].user_id;
                }
                let datanya = {
                    id: x.id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi_foto,
                    foto: x.url,
                    tanggal: x.created_at,
                    jml_comment: x.comment_count,
                    jml_like: x.likefoto_count,
                    idUserLike: userlike,
                    useractive: e.idUser
                }
                dataExplore.push(datanya)

            })
            getExplore()
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    })
}

const getExplore =()=>{
    $('#exploredata').html('')
    dataExplore.map((x, i)=>{
        $('#exploredata').append(
            `
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <a href="{{ asset('foto/' . $post->foto) }}">
                                    <img src="{{ asset('foto/' . $post->foto) }}" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">{{ $post->judul }}</h5>
                                            <a href="/view" class="btn-hover text-white">Detail <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
            `
        )
    })
}


function likes(txt, id){
    $.ajax({
        url: window.location.origin +'/likefotos',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: id
        },
        success: function(res){
            console.log(res)
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal')
        }
    })
}
