<?php

namespace App\Http\Controllers;

use App\Models\Jam;

use App\Models\Hari;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Matkul;
use App\Models\Ruangan;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\Rancangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalRequest;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Prodi::all();

        return view('pages.jadwal.index')->with([
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $prodi = Prodi::where('id', $id)->first();
        $matkuls = Matkul::where('id_prodi', $id)->get();
        $kelas = Kelas::where('id_prodi', $id)->get();
        $hari = Hari::all();
        $jam = Jam::all();
        $ruangans = Ruangan::all();

        return view('pages.jadwal.create')->with([
            'matkuls' => $matkuls,
            'kelas' => $kelas,
            'ruangans' => $ruangans,
            'id' => $id,
            'jam' => $jam,
            'hari' => $hari,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        $data = $request->all();
        Jadwal::create($data);
        return redirect('jadwal/'. $data['id_prodi'])->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = Prodi::with('fakultas')->findOrFail($id);
        
        $items = Jadwal::where([['id_prodi', $id]])->with(['matkul','ruangan','kelas'])->get();

        return view('pages.jadwal.show')->with([
            'item' => $item,
            'items' => $items,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Jadwal::with(['matkul','ruangan'])->findOrFail($id);
        // dd($item);
        $matkuls = Matkul::all();
        $kelas = Kelas::all();
        $hari = Hari::all();
        $jam = Jam::all(); 
        $ruangans = Ruangan::all();

        return view('pages.jadwal.edit')->with([
            'item' => $item,
            'matkuls' => $matkuls,
            'kelas' => $kelas,
            'ruangans' => $ruangans,
            'id' => $id,
            'jam' => $jam,
            'hari' => $hari
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $item = Jadwal::findOrFail($id);
        $item->update($data);

        return redirect('jadwal/'. $data['id_prodi'])->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jadwal::findOrFail($id);
        $item->delete();

        return redirect('jadwal/'. $item->id_prodi)->with('status', 'Data berhasil dihapus!');
    }
}
