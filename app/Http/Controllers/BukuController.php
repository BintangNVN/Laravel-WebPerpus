<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bukus = Book::where('name', 'LIKE', '%'.$request->cari.'%')->simplePaginate(5)->appends($request->all());
        // compact() -> mengirimkan data ($) agar data $nya bisa dipake di blade
        return view('pages.data_buku', compact('bukus'));
        
        
    
    }

    /**
     * Show the ooform for creating a new resource.
     */
    public function create()
    {
        return view('Buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'kategori' => 'required|max:50', // Sesuaikan dengan batas panjang kolom di database,
            'image' => 'image|max:2048',
            'penulis' => 'required',
            'jumlah_buku' => 'required|numeric'
        ],[
            'name.required' => 'Judul Buku Harus Diisi!',
            'name.max' => 'Maksimal 100 karakter',
            'kategori.required' => 'Kategori Buku Harus Diisi!',
            'penulis.required' => 'Penulis Harus Diisi!',
            'jumlah_buku.numeric' => 'Jumlah buku Harus Diisi Angka!',
        ]);

         $requestData = $request->all(); // Ambil semua data dari request
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')->store('images', 'public');
        }

        Book::create($requestData);

        return redirect()->back()->with('success', 'Berhasil Menambah Buku Baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bukus = Book::find($id);
        return view('Buku.edit', compact('bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|max:100',
        //     'kategori' => 'required',
        //     'image' => 'image|max:2048',
        //     'penulis' => 'required',
        //     // 'jumlah_buku' => 'required|numeric'
        // ]);

        // Book::where('id', $id)->update([
        //     'name' => $request->name,
        //     'kategori' => $request->kategori,
        //     'image' => $request->image,
        //     'penulis' => $request->penulis,
        //     // 'jumlah_buku' => $request->jumlah_buku
        // ]);

        // return redirect()->route('data_buku.data')->with('success', 'Berhasil Mengubah Data Buku!');

        $request->validate([
            'name' => 'required|max:100',
            'kategori' => 'required',
            'image' => 'image|max:2048|nullable', // Gambar boleh null
            'penulis' => 'required',
        ]);

        // Mencari buku berdasarkan ID
        $buku = Book::findOrFail($id);
        $dataToUpdate = [
            'name' => $request->name,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            // Jika ada gambar baru, simpan path-nya
        ];

        if ($request->hasFile('image')) {
            $dataToUpdate['image'] = $request->file('image')->store('images', 'public');
        }

        $buku->update($dataToUpdate);

        return redirect()->route('data_buku.data')->with('success', 'Berhasil Mengubah Data Buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Book::findOrFail($id);
        $buku->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data Buku!');
    }
}
