<?php

namespace App\Http\Controllers;

use App\Models\Alats;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlatsController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $alat = Alats::latest()->get();
            return view('admin.alat.data', [
                "title"     => "Data Alat",
                "desk"      => "Data Alat",
                "keyword"   => "Data Alat, Banjir, Pekanbaru, Bpp",
                "alat"     => $alat
            ]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function tambah()
    {
        if(Auth::check()){
            $alat = Alats::latest()->get();
            return view('admin.alat.tambah', [
                "title"     => "Tambah Alat",
                "desk"      => "Tambah Alat",
                "keyword"   => "Tambah Alat, Banjir, Pekanbaru, Bpp",
                "alat"     => $alat
            ]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit($id)
    {
        if(Auth::check()){
            $alat = Alats::findOrFail($id);
            return view('admin.alat.edit', [
                "title"     => "Edit Alat",
                "desk"      => "Edit Alat",
                "keyword"   => "Edit Alat, Banjir, Pekanbaru, Bpp",
                "alat"     => $alat
            ]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function tambahproses(Request $request)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'nm_alat'     => 'required',
            'alamat'   => 'required',
            'jarak_normal'   => 'required',
            'jarak_warning'   => 'required',
            'jarak_danger'   => 'required',
            'lat'   => 'required',
            'lng'   => 'required'
        ]);

        //upload image
        // $image = $request->file('gambar');
        // $image->storeAs('public/berkas/alat', $image->hashName());

        $image = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('file/alat'), $image);

        $hajar = Alats::create([
            'gambar'     => $image,
            'nm_alat'     => $request->nm_alat,
            'alamat'   => $request->alamat,
            'jarak_normal'   => $request->jarak_normal,
            'jarak_warning'   => $request->jarak_warning,
            'jarak_danger'   => $request->jarak_danger,
            'lat'   => $request->lat,
            'lng'   => $request->lng,
        ]);

        if($hajar){
            $lastid = Alats::latest()->first()->id;;
            Status::create([
                'alats_id' => $lastid,
                'alerts_id' => '2'
            ]);
            return redirect()->route('master-alat')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('master-alat')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    public function editproses(Request $request)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'nm_alat'     => 'required',
            'alamat'   => 'required',
            'jarak_normal'   => 'required',
            'jarak_warning'   => 'required',
            'jarak_danger'   => 'required',
            'lat'   => 'required',
            'lng'   => 'required'
        ]);

        $id     = $request->id;

        $image = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('file/alat'), $image);

        $hajar = Alats::find($id)->update([
            'gambar'     => $image,
            'nm_alat'     => $request->nm_alat,
            'alamat'   => $request->alamat,
            'jarak_normal'   => $request->jarak_normal,
            'jarak_warning'   => $request->jarak_warning,
            'jarak_danger'   => $request->jarak_danger,
            'lat'   => $request->lat,
            'lng'   => $request->lng,
        ]);

        if($hajar){
            return redirect()->route('master-alat')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('master-alat')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function editpass(Request $request)
    {
        $this->validate($request, [
            'password'   => 'required'
        ]);

        $id     = $request->id;
        // $post   = User::find($id)->update($request->all());
        $hajar  = User::find($id)->update([
            'password'   => Hash::make($request->password)
        ]);

        if($hajar){
            return redirect()->route('data-pengguna')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function destroy(Request $request)
    {
        $id     = $request->id;
        $post   = User::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('data-pengguna')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('data-pengguna')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
