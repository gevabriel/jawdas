@extends('user.layouts.layout')

@section('content')
<div id="mahasiswa">
  <div class="container">
    @if ($mahasiswa->id_kelas === null)
      <td>Tidak dapat mengisi KRS, karena kelas anda belum ditentukan</td>
    @else
    <div class="row">
      <div class="col-12">
        <h4>Rancangan Jadwal Anda</h4>
      </div>
    </div>
    <div class="row bio">
      <div class="col-md-2">
        <img src="/image/mahasiswa/{{ $mahasiswa->photo }}" class="photo" alt="">
      </div>
      <div class="col-md-5">
        <table class="table">
          <tbody>
            <tr>
              <td>Nim</td>
              <td>:</td>
              <td>{{$mahasiswa->nim}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td>{{$mahasiswa->nama}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-5">
        <table class="table">
          <tbody>
            <tr>
              <td>Program Studi</td>
              <td>:</td>
              <td>{{$mahasiswa->prodis->prodi}}</td>
            </tr>
            <tr>
              <td>Angkatan</td>
              <td>:</td>
              <td>{{$mahasiswa->kelas->nama}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <a type="submit" href="{{ url('/rancangan/create') }}" class="btn btn-primary mt-3 mb-3">Tambah Kelas <i class="fas fa-plus"></i></a>
        <!-- <a type="submit" href="{{ route('rancangan.show', $mahasiswa->id) }}" target="_blank" class="btn btn-success mt-3 mb-3">Cetak KRS <i class="fas fa-print"></i></a> -->
      </div>
      <div class="col-md-8">
        @if (session('status'))
          <div class="alert alert-success mt-3">
              {{ session('status') }}
          </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 daftarKrs">
        <table class="table table-striped">
          <thead class="thead-dark">
            <th>
              No
            </th>
            <th>
              Semester
            </th>
            <th>
              Kode Mata Kuliah
            </th>
            <th>
              Mata Kuliah
            </th>
            <th>
              SKS
            </th>
            <th>
              Angkatan
            </th>
            <th>
              Hari
            </th>
            <th>
              Jam
            </th>
            <th>
              Ruangan
            </th>
            <th>
              Hapus
            </th>
          </thead>
          <tbody>
          @forelse ($items as $index => $item)
            <tr>
              <td>
              {{ $index+1 }}
              </td>
              <td>
              {{ $item->jadwal['matkul']['smt'] }}({{ $item->jadwal['matkul']['semester'] }})
              </td>
              <td>
              {{ $item->jadwal['matkul']['kode'] }}
              </td>
              <td>
              {{ $item->jadwal['matkul']['matkul'] }}
              </td>
              <td>
              {{ $item->jadwal['matkul']['sks'] }}
              </td>
              <td>
              {{ $item->jadwal['kelas']['nama'] }}
              </td>
              <td>
              {{ $item->jadwal['hari']['hari'] }}
              </td>
              <td>
              {{ $item->jadwal['jam']['jam'] }}
              </td>
              <td>
              {{ $item->jadwal['ruangan']['ruangan'] }}
              </td>
              <td>
                <form action="{{ route('rancangan.destroy', $item->id) }}" 
                  method="post" 
                  class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td>
                Belum mengambil Mata Kuliah
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <table border="0">
          <tbody>
            <tr>
              <td>Total SKS yang diambil</td>
              <td>:</td>
              <td>{{ $totalSks }}</td>
            </tr>
            <tr>
              <td>Maksimal SKS yang diambil</td>
              <td>:</td>
              <td>{{ $maxSks }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection