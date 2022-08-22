<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::all();
        return view('profil.index', compact([
            'profil'
        ]));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'umur' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ]);

        try {
            Profil::create($data);
            return redirect()->back();
        } catch (\Throwable $th) {
            abort(404, 'gagal create profil');
        }
    }

    public function edit($id)
    {
        $profil = Profil::find($id);
        // dd($profil);
        return view('profil.edit', compact([
            'profil'
        ]));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $profil = Profil::find($id);

        $request->validate([
            'umur' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ]);

        try {
            $profil->update($data);
            return redirect()->route('profil.index');
        } catch (\Throwable $th) {
            abort(404, 'Gagal');
        }
    }
}
