<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use File;

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
        $category = Category::get();

        return view('post.edit', compact([
            'post', 'category'
        ]));

        // return view('post.edit', [
        //     'post' => $post, 'category' => $category
        // ]);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $post = Post::find($id);

        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
            'categories_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->has('image')) {
            $path = 'image/';
            File::delete($path . $post->image);

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $fileName);

            $post->image = $fileName;

            $post->save();
        }

        $post->judul = $request['judul'];
        $post->slug = $request['slug'];
        $post->content = $request['content'];
        $post->categories_id = $request['categories_id'];

        try {
            $post->save();
            return redirect()->route('post.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        // dd($post);
        return view('post.show', compact('post'));
    }
}
