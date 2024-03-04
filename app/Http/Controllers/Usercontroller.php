<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use App\Models\Album;
use App\Models\Komen;
use App\Models\Like;
use App\Models\Kategori;


class Usercontroller extends Controller
{
    public function login(Request $request)
    {
        // Validasi
        $validated = $request->validate ([
        
        'email'          => 'required|min:15',
        'password'          => 'required|min:6'
        ]);

        // Proses Login
        if(Auth::attempt([

            'email'     =>$request->email, 
            'password'  =>$request->password])){

            $request->session()->regenerate();
            return redirect('/masuk')->with('success', 'Anda berhasil Login'); 
    	}else{
            return redirect('/login')->with('error', 'Data yang anda masukkan tidak sesuai');
    	}
    }

     public function register(Request $request){
       
        //Validasi
    $validated = $request->validate ([
        'nama_lengkap'   => 'required',
        'alamat'         => 'required',
        'tgl_lahir'      => 'required',
        'email'          => 'required|min:15|unique:users',
        'password'       => 'required|min:6'
        ]);

		//Proses Simpan
        $dataUser = [
            'nama_lengkap' => $request->nama_lengkap,
            'alamat'       =>  $request->alamat,
            'tgl_lahir'    =>  $request->tgl_lahir,
            'email'        => $request->email,
            'password'     =>  bcrypt($request->password),
            'foto_profile' =>  'download.png'
            ];
            User::create($dataUser);
            return redirect('/login')->with('success', 'Registrasi berhasil, Silahkan Login'); 
            
    }
    public function logout(Request $request)
    {
        // Proses Penghancuran Session
        $request->session()->invalidate();
        // Prosess Pembuatan Ulang Session 
        $request->session()->regenerate();
        return redirect('/')->with('success', 'Anda Berhasil Logout');
    }

    public function uploadfoto(Request $request){
        $request->validate([
            'foto'      =>'required|mimes:png,jpg,jpeg',
            'judul'     =>'required',
            'deskripsi' =>'required',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->getClientOriginalName();
        $foto_nama =  date('y-m-d h.i.s') . ".". $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $datafoto = [
            'id_user'       => Auth::user()->id,
            'id_user'       => auth()->user()->id,
            'id_album'      => $request->idalbum,
            'id_kategori'   => $request->idkategori,
            'foto'          => $foto_nama,
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
        ];

    Post::create($datafoto);
    return redirect('/masuk')->with('success', 'Foto berhasil di upload'); 
    }

    public function showAllPosts()
    {
    $posts = Post::all();
    return view('User.explore', compact('posts')); // Mengirimkan variabel $posts ke view
    }

    public function detail(Request $request, $id){
        $detail = Post::find($id);
        $user = User::find($detail->id_user);
        $komen = Komen::with('user')->where('id_foto', $id)->get();
        return view('User.view', compact('detail','user','komen'));
    }
    
    public function createalbum(Request $request){
        $request->validate([
            
            'judul_album'     =>'required',
            'judul_deskripsi' =>'required',
        ]);

        $datafoto = [
            'id_user' => auth()->user()->id,
            'judul_album' => $request->input('judul_album'),
            'deskripsi_album' => $request->input('judul_deskripsi'),
        ];

        Album::create($datafoto);
        return redirect('/create')->with('success', 'Album berhasil dibuat'); 

        }

        public function album(Request $request, $id){
            $album = Album::where('id_user', auth()->user()->id)->get();
        return view('User.create', compact('album'));
        }

        public function viewalbum(Request $request, $id){
            $view = Album::find($id);
            $albumview = Post::where('id_album', $id)->get();
            $user = User::find($view->id_user);
        return view('User.viewAlbum', compact('view','user','albumview'));
        }


    public function ubahpassword(Request $request){
        //kofirmasi password lama
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return redirect('/profile#editprofile')->with('error', 'Password lama salah harap isi dengan benar');
        }if($request->new_password != $request->repeat_password){
            return redirect('/profile#editprofile')->with('warning', 'Password baru dan konfirmasi password harus sama');
        }
            auth()->user()->update([
                'password' => Hash::make($request->new_password)
        ]);
            return redirect('/profile#editprofile')->with('success', 'Password Anda berhasil di ubah');
    } 

    public function editprofile(Request $request){


        $foto_file = $request->file('foto_profile');
        $foto_ekstensi = $foto_file->getClientOriginalName();
        $foto_nama =  date('y-m-d h.i.s') . ".". $foto_ekstensi;
        $foto_file->move(public_path('foto_profile'), $foto_nama);
        
        $datauser=[
            'nama_lengkap'  => $request->new_nama,
            'alamat'        => $request->new_alamat,
            'tgl_lahir'     => $request->new_tgl_lahir,
            'bio'           => $request->new_bio,
            'foto_profile'  => $foto_nama,
        ];
        $user = auth()->user();

        User::find($user->id)->update($datauser);
        return redirect('/profile')->with('success', 'Profil anda berhasil di ubah');
    }


    public function search(Request $request){
        $keyword = $request->search;
        $results = Post::where('judul','LIKE','%'.$keyword.'%')->get();

            return view('User.search',[
                'keyword' => $keyword,
                'posts'    => $results,
            ]);
      }

    public function komen(Request $request){
        $datakomen =[
             'id_user'      => Auth::user()->id,
             'id_foto'      => $request->input('id_foto'),
             'isi_komentar' => $request->isi_komentar,
         ];

        Komen::create($datakomen);
        return back();
    }

    public function like(Request $request){
        $idfoto = $request->id_foto;
        $liked = Like::where('id_foto', $idfoto)->where('id_user', auth()->id())->exists();
        if($liked){
            Like::where('id_foto',$idfoto)->where('id_user', auth()->id())->delete();
            return redirect()->back()->with('success', 'kamu unlike');
        } else{
            Like::create([
                'id_foto' => $idfoto,
                'id_user' => auth()->id()
            ]);
            return redirect()->back()->with('success', 'Like berhasil');
        }  
    }

    public function updatefoto(Request $request, $id){
        $foto = Post::findorfail($id);
        $data_foto = [
            'judul'         => $request->judul_baru,
            'deskripsi'     => $request->deskripsi_baru,
        ];
        $foto->update($data_foto);
        return redirect('/masuk')->with('success', 'Judul dan deskripsi berhasil di ubah');
    }

    public function deletfoto($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/masuk')->with('success', 'Foto berhasil di hapus');
    }

    public function updatealbum(Request $request, $id){
        $album = Album::findorfail($id);
        $data_album = [
            'judul_album'         => $request->judul_baru,
            'deskripsi_album'     => $request->deskripsi_baru,
        ];
        $album->update($data_album);
        return redirect('/create')->with('success', 'Judul dan deskripsi berhasil di ubah');
    }

    public function deletalbum($id){
        $post = Album::find($id);
        $post->delete();
        return redirect('/create')->with('success', 'Album berhasil di hapus');
    }


     

}
