<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $users = User::latest()->get();
            return view('admin.pengguna.data', [
                "title"     => "Data Pengguna",
                "desk"      => "Data Pengguna",
                "keyword"   => "Data Pengguna, Banjir, Pekanbaru, Bpp",
                "users"     => $users
            ]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            // 'image'     => 'required|image|mimes:png,jpg,jpeg',
            'name'     => 'required',
            'email'   => 'required',
            'password'   => 'required'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        $hajar = User::create([
            // 'image'     => $image->hashName(),
            'name'     => $request->name,
            'email'   => $request->email,
            'password'   => Hash::make($request->password)
        ]);

        if($hajar){
            return redirect()->route('data-pengguna')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    public function edit(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required'
        ]);

        $id     = $request->id;
        // $post   = User::find($id)->update($request->all());
        $hajar  = User::find($id)->update([
            'name'     => $request->name,
            'email'   => $request->email
        ]);

        if($hajar){
            return redirect()->route('data-pengguna')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('data-pengguna')->with(['error' => 'Data Gagal Disimpan!']);
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
            return redirect()->route('data-pengguna')->with(['error' => 'Data Gagal Disimpan!']);
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
