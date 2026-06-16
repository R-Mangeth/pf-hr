<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        return view('catalogo.index');
    }

    public function create()
    {
        return view('catalogo.create');
    }

    public function edit($id)
    {
        return view('catalogo.edit');
    }

    public function store(Request $request) {}
    public function show($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}