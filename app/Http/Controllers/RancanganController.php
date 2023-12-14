<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kelas;
use App\Models\Rancangan;
use App\Models\Matkul;
use App\Models\Hari;
use App\Models\Jam;
use Illuminate\Http\Request;

class RancanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // menambilkan data mahasiswa dan krs yang diambil mahasiswa --1
        // data dari session
        $data = $request->session()->get('mahasiswa');
        // relasikan dengan prodi dan kelas
        $mahasiswa = Mahasiswa::with(['prodis', 'kelas'])->findOrFail($data->id);
        $items = Rancangan::where('id_mahasiswa', $mahasiswa->id)->with(['jadwal'])->get();
        $totalSks = 0;
        $maxSks = 24;
        foreach ($items as $item) {
            $totalSks = $totalSks + $item->jadwal->matkul->sks;
        }
        // end data mahasiswa --1

        return view('user.rancangan.index')->with([
            'mahasiswa' => $mahasiswa,
            'items' => $items,
            'totalSks' => $totalSks,
            'maxSks' => $maxSks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // ambil session mahasiswa
        $mahasiswa = $request->session()->get('mahasiswa');
        // ambil schedule yang sudah dimasukkan ke krs
        $rancanganMahasiswas = Rancangan::where('id_mahasiswa', $mahasiswa->id)->with(['jadwal'])->get();
        // ambil id dari schedule yang sudah dimasukkan ke krs
        foreach ($rancanganMahasiswas as $index => $rancanganMahasiswa) {
            $idRancangan[] = $rancanganMahasiswa->id_jadwal;
        }
        // ambil total sks krs mahasiswa
        $totalSks = 0;
        $maxSks = 24;
        foreach ($rancanganMahasiswas as $item) {
            $totalSks = $totalSks + $item->jadwal->matkul->sks;
        }
        // ambil seluruh schedule
        $items = Jadwal::where('id_prodi', $mahasiswa->id_prodi)->with(['matkul', 'ruangan', 'hari', 'jam'])->get();
        // ambil seluruh id schedule
        foreach ($items as $index => $item) {
            $idJadwal[] = $item->id;
        }
        // bandingkan id schedule yang sudah ada di krs mahasiswa dengan id schedule keseluruhan
        // agar didapat data schedule yg belum dipilih mahasiswa
        if (count($rancanganMahasiswas) == 0) {
            $data = Jadwal::where('id_prodi', $mahasiswa->id_prodi)->with(['matkul', 'ruangan', 'hari', 'jam'])->get();
        } else {
            $results = array_diff($idJadwal, $idRancangan);
            foreach ($results as $result) {
                $datas[] = Jadwal::where('id', $result)->get();
            }
            // dd($datas);

            if (isset($datas)) {
                foreach ($datas as $item) {
                    $data[] = $item[0];
                }
            } else {
                return redirect()->route('rancangan.index')->with('status', 'Mata kuliah tidak tersedia');
            }
        }

        return view('user.rancangan.create')->with([
            'data' => $data,
            'idMahasiswa' => $mahasiswa->id,
            
            'totalSks' => $totalSks,
            'maxSks' => $maxSks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // ambil data schedule berdasarkan id yg dikirim dr create
        if (isset($data['matkul'])) {
            foreach ($data['matkul'] as $index => $item) {
                $jadwal[] = Jadwal::where('id', $item)->get();
            }
        } else {
            return redirect()->route('rancangan.index')->with('status', 'Tidak ada Mata Kuliah yang dipilih');
        }

        // ambil data matkul berdasarkan id matkul yang ada pada data schedule
        foreach ($jadwal as $index => $item) {
            $matkul[] = Matkul::where('id', $item[0]->id_matkul)->get();
        }
        // hitung total sks yg diambil
        $sks = 0;
        foreach ($matkul as $index => $item) {
            $sks = $sks + $item[0]->sks;
        }
        // ambil session mahasiswa
        $mahasiswa = $request->session()->get('mahasiswa');
        // ambil seluruh schedule
        $items = Jadwal::where('id_prodi', $mahasiswa->id_prodi)->with(['matkul', 'ruangan', 'hari', 'jam'])->get();

        // ambil schedule yang sudah dimasukkan ke krs
        $rancanganMahasiswas = Rancangan::where('id_mahasiswa', $mahasiswa->id)->with(['jadwal'])->get();

        // ambil id hari dan id jam yang sudah dimasukkan ke krs berdasarkan schedule
        $idHariRancangan = $idJamRancangan = [];
        foreach ($rancanganMahasiswas as $index => $item) {
            $idHariRancangan[] = $item->jadwal->id_hari;
            $idJamRancangan[] = $item->jadwal->id_jam;
        }
        // cek kondisi jika total sks lebih dari max sks
        if ($data['totalSks'] + $sks > $data['maxSks']) {
            return redirect()->route('rancangan.index')->with('status', 'Jumlah SKS matakuliah melebihi batas maksimal pengambilan!');
        } else {
            // simpan KRS
            foreach ($data['matkul'] as $index => $value) {
                $idHari = $idJam = [];
                foreach ($jadwal as $index => $item) {
                    $idHari[] = $item[0]->id_hari;
                    $idJam[] = $item[0]->id_jam;
                }
                // cek kondisi tabrakan
                if (!$this->isJadwalConflict($idHari, $idJam, $idHariRancangan, $idJamRancangan)) {
                    Rancangan::create([
                        'id_mahasiswa' => $data['idMahasiswa'],
                        'id_jadwal' => $data['matkul'][$index],
                    ]);
                } else {
                    return redirect()->route('rancangan.index')->with('status', 'Jadwal kuliah bertabrakan!');
                }
            }
            return redirect()->route('rancangan.index')->with('status', 'Jadwal kuliah berhasil ditambahkan!');
        }
        // fungsi cek tabrakan              
        $isJadwalConflict = function () use ($idHari, $idJam, $idHariRancangan, $idJamRancangan) {
            foreach ($idHariRancangan as $index1 => $item1) {
                foreach ($idJamRancangan as $index2 => $item2) {
                    foreach ($idHari as $index3 => $item3) {
                        foreach ($idJam as $index4 => $item4) {
                            // periksa apakah terdapat jadwal yang bertabrakan
                            if ($item1 === $item3 && $item2 === $item4) {
                                return true;
                            }
                        }
                    }
                }
            }
            return false;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // data mahasiswa
        $mahasiswa = Mahasiswa::with(['prodis', 'kelas'])->findOrFail($id);
        // data krs
        $items = Rancangan::where('id_mahasiswa', $mahasiswa->id)->with(['jadwal'])->get();
        $totalSks = 0;
        $maxSks = 24;
        foreach ($items as $item) {
            $totalSks = $totalSks + $item->jadwal->matkul->sks;
        }
        return view('user.rancangan.cetak')->with([
            'mahasiswa' => $mahasiswa,
            'items' => $items,
            'totalSks' => $totalSks,
            'maxSks' => $maxSks,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Rancangan::findOrFail($id);
        $item->delete();

        return redirect()->route('rancangan.index')->with('status', 'Mata Kuliah berhasil dihapus!');
    }

    private function isJadwalConflict($idHari, $idJam, $idHariRancangan, $idJamRancangan)
    {
        foreach ($idHariRancangan as $index1 => $item1) {
            foreach ($idJamRancangan as $index2 => $item2) {
                foreach ($idHari as $index3 => $item3) {
                    foreach ($idJam as $index4 => $item4) {
                        // periksa apakah terdapat jadwal yang bertabrakan
                        if ($item1 === $item3 && $item2 === $item4) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}
