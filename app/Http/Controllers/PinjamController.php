<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $pinjams = Pinjam::where('name', 'like', "%$cari%")->paginate(10);
        return view('pages.peminjaman', compact('pinjams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman.pinjam');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required',
            'judul' => 'required',
            'tanggal' => 'required'
        ]);

        Pinjam::create($request->all());


        return redirect()->back()->with('success', 'Berhasil Menambah Data Pinjaman!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $pinjams = Pinjam::find($id);
        return view('Peminjaman.edit', compact('pinjams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi data yang diterima dari request
    $request->validate([
        'name' => 'max:100',
        'email' => 'email',
        'judul' => 'max:255', // Pastikan judul wajib diisi
    ]);

    // Temukan pinjam berdasarkan ID
    $pinjam = Pinjam::findOrFail($id);

    // Update data pinjam
    $pinjam->update([
        'name' => $request->name,
        'email' => $request->email,
        'judul' => $request->judul, // Pastikan judul tidak null
    ]);

    // Redirect ke route dengan pesan sukses
    return redirect()->route('peminjaman_buku.data')->with('success', 'Berhasil Mengubah Data Pinjam!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Pinjam::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data Pengguna!');
    }
}
