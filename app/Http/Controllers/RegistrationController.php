<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(MahasiswaRequest $request)
    {
        $data = $request->all();

        $photoName = $data['photo']->getClientOriginalName() . '-' . time(). '.' . $data['photo']->extension();
        $data['photo']->move(public_path('image/mahasiswa'), $photoName);

        Mahasiswa::create([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'id_prodi' => $data['id_prodi'],
            'agama' => $data['agama'],
            'telp' => $data['telp'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'photo' => $photoName,
        ]);

        User::create([
            'name' => $data['nama'],
            'username' => $data['nim'],
            'password' => Hash::make($data['password']),
            'role' => "Mahasiswa",
        ]);

        return redirect()->route('mahasiswa.index')->with('status', 'Data berhasil ditambahkan!');
    }
}
