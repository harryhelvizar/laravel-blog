<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::all();
        // dd($category);
        return view('category', compact([
            'category'
        ]));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => 'required'
        ]);
        try {
            // if ($request->hasFile('foto_profile')) {
            //     $foto = $request->file('foto_profile');
            //     $nama_file = $foto->getClientOriginalName();
            //     $foto->move('upload', $nama_file);
            //     $data['foto_profile'] = $nama_file;
            // }
            Category::create($data);
            return redirect()->back();
        } catch (\Throwable $th) {
            abort(404, 'Data gagal ditanmbah');
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('categoryedit', compact([
            'category'
        ]));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $category = Category::find($id);

        $request->validate([
            'name' => 'required'
        ]);

        try {
            $category->update($data);
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            abort(404, 'Data Gagal di Update');
        }
    }
}
