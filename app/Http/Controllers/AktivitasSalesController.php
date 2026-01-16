<?php

namespace App\Http\Controllers;

use App\Models\AktivitasSales;
use Illuminate\Http\Request;

class AktivitasSalesController extends Controller
{
    public function index()
    {
        $rows = AktivitasSales::with('pelanggan')->get();
        return view('aktivitas_sales.index', compact('rows'));
    }

    public function create()
    {
        return view('aktivitas_sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'aktivitas' => 'required|string',
            'hasil' => 'required|in:berhasil,tidak berhasil,pending',
        ]);

        $data = $request->only(['tanggal', 'pelanggan_id', 'aktivitas', 'hasil']);
        AktivitasSales::create($data);
        return redirect()->route('aktivitas-sales.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $aktivitasSales = AktivitasSales::findOrFail($id);
        return view('aktivitas_sales.edit', compact('aktivitasSales'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'aktivitas' => 'required|string',
            'hasil' => 'required|in:berhasil,tidak berhasil,pending',
        ]);

        $aktivitasSales = AktivitasSales::findOrFail($id);
        $aktivitasSales->update($request->only(['tanggal', 'pelanggan_id', 'aktivitas', 'hasil']));
        return redirect()->route('aktivitas-sales.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        AktivitasSales::destroy($id);
        return redirect('/aktivitas-sales');
    }
}
