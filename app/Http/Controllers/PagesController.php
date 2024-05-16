<?php

namespace App\Http\Controllers;

use App\Models\Filem;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $allFilem = Filem::get();
        return view('pages.home', compact('allFilem'));
    }
    public function detail($id)
    {
        $Filem = Filem::findOrFail($id);
        return view('pages.detail', compact('Filem'));
    }
}
