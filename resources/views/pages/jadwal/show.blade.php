@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <a href="{{ route('jadwal.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header">
                <h3 class="card-title "></b>Jadwal Kuliah {{$item->prodi}}</b></h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                      <p>Program Studi: {{$item->prodi}}</p>
                      <p>Jenjang: {{$item->jenjang}}</p>
                  </div>
                </div>
              </div>
            </div>
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
            <a type="submit" href="{{ url('jadwal/'. $item->id . '/create') }}" class="btn btn-dark pull-right">Tambah Mata Kuliah</a>
            <div class="clearfix"></div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title "><b>Data Matakuliah</b></h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text">
                        <th>
                          <b>No</b>
                        </th>
                        <th>
                          <b>Semester</b>
                        </th>
                        <th>
                          <b>Kode Matakuliah</b>
                        </th>
                        <th>
                          <b>Matakuliah</b>
                        </th>
                        <th>
                         <b>SKS</b>
                        </th>
                        <th>
                         <b>Kelas</b>
                        </th>
                        <th>
                         <b>Hari</b>
                        </th>
                        <th>
                         <b>Waktu</b>
                        </th>
                        <th>
                         <b>Ruangan</b>
                        </th>
                        <th>
                         <b>Action</b>
                        </th>
                      </thead>
                      <tbody>
                      @forelse ($items as $index => $item)
                        <tr>
                          <td>
                          {{ $index+1 }}
                          </td>
                          <td>
                          {{ $item->matkul->smt }} ({{$item->matkul->semester}})
                          </td>
                          <td>
                          {{ $item->matkul->kode }}
                          </td>
                          <td>
                          {{ $item->matkul->matkul }}
                          </td>
                          <td>
                          {{ $item->matkul->sks }}
                          </td>
                          <td>
                          {{ $item->kelas->nama }}
                          </td>
                          <td>
                          {{ $item->hari->hari }}
                          </td>
                          <td>
                          {{ $item->jam->jam }}
                          </td>
                          <td>
                          {{ $item->ruangan->ruangan }}
                          </td>
                          <td>
                            <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('jadwal.destroy', $item->id) }}" 
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