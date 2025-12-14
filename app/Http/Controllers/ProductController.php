<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produk::paginate(10);
        // $kategori = Kategori::all();
        return view('dashboard.admin.produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required',
            'deskripsi_produk' => 'nullable|string',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
            'gambar_produk' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fileName = 'default.png';

        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $fileName = time() . '_' . $file->getClientOriginalName(); //extension cmn ngambil .png .jpg, dll
            $file->move(public_path('images'), $fileName);
        }

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'gambar_produk' => $fileName,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.edit', compact('product', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required',
            'deskripsi_produk' => 'nullable|string',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
            'gambar_produk' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $product = Produk::findOrFail($id);
        $fileName = $product->gambar_produk;

        if ($request->hasFile('gambar_produk')) {

            if ($product->gambar_produk !== 'default.png' && file_exists(public_path('images/' . $product->gambar_produk))) {
                unlink(public_path('images/' . $product->gambar_produk));
            }

            $file = $request->file('gambar_produk');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'id_kategori' => $request->id_kategori,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'gambar_produk' => $fileName
        ]);

        return redirect()->route('dashboard.admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $product = Produk::findOrFail($id);

         if ($product->gambar_produk !== 'default.png' && file_exists(public_path('images/' . $product->gambar_produk))) {
            unlink(public_path('images/' . $product->gambar_produk));
        }

        $product->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
