<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $rows = Pelanggan::all();
        return view('pelanggan.index', compact('rows'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        Pelanggan::create($request->all());
        return redirect('/pelanggan')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $row = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $row = Pelanggan::findOrFail($id);
        $row->update($request->all());

        return redirect('/pelanggan')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect('/pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
