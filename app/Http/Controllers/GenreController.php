<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class genreController extends Controller
{
    public function index()
    {
        $allgenre = genre::get();
        return view('admin.genre.index', compact('allgenre'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'nama_genre' => 'required|max:50|min:5|unique:genres,nama_genre',
        ], [
            'nama_genre.required' => 'genre nama cannot be blank',
            'nama_genre.unique' => 'The genre nama has already been taken.'
        ]);
        Genre::create($attributes);
        return redirect()->to('/genre')->with('success', 'added data successfully');
    }

    public function edit($id)
    {
        $genre     = genre::findOrFail($id);
        return view('admin.genre.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_genre'          => 'required',
        ]);

        $genre = genre::find($id);

        $genre->nama_genre = $request->nama_genre;

        $genre->save();

        return redirect('/genre');
    }

    public function destroy($id)
    {
        genre::where('id', $id)->delete();
        return redirect()->to('/genre')->with('success', 'The data has been successfully deleted');
    }
}
