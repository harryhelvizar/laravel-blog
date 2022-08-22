<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact([
            'product'
        ]));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required'
        ]);

        try {
            Product::create($data);
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact([
            'product'
        ]));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $product = Product::find($id);

        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required'
        ]);

        try {
            $product->update($data);
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            abort(404, 'Data gagal');
        }
    }
}
