@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <a href="{{ route('kelas.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="col-4">
            <a type="submit" href="{{ url('kelas/'. $item->id . '/add') }}" class="btn btn-dark pull-right">Tambah</a>
            <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header">
                <h3 class="card-title "><b>Data Mahasiswa Kelas {{$item->nama}}</b></h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                      <p>Nama Kelas: {{$item->nama}}</p>
                      <p>Program Studi: {{$item->prodi->prodi}}</p>
                  </div>
                  <div class="col-md-4">
                      <p>Tahun Angkatan: {{$item->angkatan}}</p>
                  </div>
                  <div class="col-md-4">
                      <p>Jumlah Mahasiswa: {{$jumlahMahasiswa}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title "><b>Mahasiswa</b></h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text">
                        <th>
                          <b>No</b>
                        </th>
                        <th>
                         <b> Nim</b>
                        </th>
                        <th>
                          <b>Nama</b>
                        </th>
                        <th>
                          <b>Action</b>
                        </th>
                      </thead>
                      <tbody>
                      @forelse ($mahasiswa as $index => $items)
                        <tr>
                          <td>
                          {{ $index+1 }}
                          </td>
                          <td>
                          {{ $items->nim }}
                          </td>
                          <td>
                          {{ $items->nama }}
                          </td>
                          <td>
                            <form action="/deleteMahasiswa/{{ $items->id }}" 
                                    method="post" 
                                    class="d-inline">
                            <input type="hidden" value="{{ $items->id }}" name="id">
                            <input type="hidden" value="{{$idKelas}}" name="idKelas">
                            <input type="hidden" value="{{$jumlahMahasiswa}}" name="jumlahMahasiswa">
                            @csrf
                                <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                </button>
                            </form>
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td>
                            data tidak tersedia
                          </td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
@endsection