<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\Prodi;
use App\Models\Kelas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function dashboard()
    {
        $mahasiswa = Mahasiswa::count();
        $matkul = Matkul::count();

        return view('pages.dashboard.index')->with([
            'mahasiswa' => $mahasiswa,
            'matkul' => $matkul,
        ]);
    }

    public function mahasiswa(Request $request)
    {
        // data dr session
        $data = $request->session()->get('mahasiswa');
        // relasikan dengan prodi dan kelas
        $item = Mahasiswa::with(['prodis','kelas'])->findOrFail($data->id);

        // dd($data);

        return view('user.dashboard.dashboard')->with([
            'item' => $item,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
