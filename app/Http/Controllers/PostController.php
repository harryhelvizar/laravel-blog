<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact(['post']));
    }

    public function create()
    {
        $category = Category::get();
        return view('post.tambah', compact([
            'category'
        ]));
    }

    public function store(Request $request)
    {
        // $data = $request->all();

        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'categories_id' => 'required'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $fileName);

        $post = new Post;

        $post->judul = $request->judul;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->image = $fileName;
        $post->categories_id = $request->categories_id;

        $post->save();

        return redirect()->route('post.index');

        // try {
        //     Post::create($data);
        //     return redirect()->route('post.index');
        // } catch (\Throwable $th) {
        //     abort(404, 'Gagal!!!');
        // }
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('post.edit', compact([
            'post'
        ]));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $post = Post::find($id);

        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'content' => 'required'
        ]);

        try {
            $post->update($data);
            return redirect()->route('post.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
