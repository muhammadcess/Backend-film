<?php

namespace App\Http\Controllers;

use App\Models\Filem;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class FilemController extends Controller
{
    public function index()
    {
        $allFilem = Filem::get();
        return view('admin.filem.index', compact('allFilem'));
    }

    public function create()
    {
        $genre = Genre::get();
        $user     = User::get();
        return view('admin.filem.create', compact('genre', 'user'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id'       => '',
            'genre_id'   => 'required',
            'judul'         => 'required',
            'gambar'        => 'required|image|mimes:jpg,png,jpeg',
            'isi'           => 'required'
        ]);


        $gambarName = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('img/gambar'), $gambarName);

        $filem = new Filem;

        $filem->user_id     = auth()->user()->id;
        $filem->genre_id = $request->genre_id;
        $filem->judul       = $request->judul;
        $filem->gambar      = $gambarName;
        $filem->isi         = $request->isi;

        $filem->save();

        return redirect('/filem')->with('success', 'added data successfully');
    }

    public function edit($id)
    {
        $genre = Genre::get();
        $user     = User::get();
        $filem   = Filem::findOrFail($id);
        return view('admin.filem.edit', compact('filem', 'genre', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'       => '',
            'genre_id'   => 'required',
            'judul'         => 'required',
            'gambar'        => 'image|mimes:jpg,png,jpeg',
            'isi'           => 'required'
        ]);


        if ($request->has('gambar')) {
            $filem = Filem::find($id);

            $path = "img/gambar/";
            File::delete($path . $filem->gambar);

            $gambarName = time() . '.' . $request->gambar->extension();

            $request->gambar->move(public_path('img/gambar'), $gambarName);

            $filem->user_id     = auth()->user()->id;
            $filem->genre_id = $request->genre_id;
            $filem->judul       = $request->judul;
            $filem->gambar      = $gambarName;
            $filem->isi         = $request->isi;

            $filem->save();

            return redirect('/filem');
        } else {
            $filem = Filem::find($id);

            $filem->user_id     = auth()->user()->id;
            $filem->genre_id = $request->genre_id;
            $filem->judul       = $request->judul;
            $filem->isi         = $request->isi;

            $filem->save();

            return redirect('/filem');
        }
    }


    public function destroy($id)
    {
        $filem = Filem::find($id);

        $path = "img/gambar/";
        File::delete($path . $filem->gambar);
        $filem->delete();

        return redirect('/filem')->with('success', 'success, data deleted');
    }
}
