<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $rows = Penjualan::with('pelanggan')->get();
        return view('penjualan.index', compact('rows'));
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'total' => 'required|numeric|min:0',
        ]);

        $data = $request->only(['tanggal_penjualan', 'pelanggan_id', 'total']);
        Penjualan::create($data);
        return redirect('/penjualan')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $row = Penjualan::findOrFail($id);
        return view('penjualan.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $row = Penjualan::findOrFail($id);
        $row->update($request->all());
        return redirect('/penjualan')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Penjualan::destroy($id);
        return redirect('/penjualan')->with('success', 'Data berhasil dihapus');
    }
}
