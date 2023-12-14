@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="col-4">
            <a type="submit" href="{{ route('kelas.create') }}" class="btn btn-dark pull-right">Tambah</a>
            <div class="clearfix"></div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title "><b>Data Kelas</b></h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text">
                        <th>
                          <b>ID</b>
                        </th>
                        <th>
                          <b>Kelas</b>
                        </th>
                        <th>
                          <b>Program Studi</b>
                        </th>
                        <!-- <th>
                          Dosen Wali
                        </th> -->
                        <th>
                          <b>Angkatan</b>
                        </th>
                        <th>
                          <b>Jumlah Mahasiswa</b>
                        </th>
                        <th>
                          <b>Action</b>
                        </th>
                      </thead>
                      <tbody>
                      @forelse ($items as $item)
                        <tr>
                          <td>
                          {{ $item->id }}
                          </td>
                          <td>
                          {{ $item->nama }}
                          </td>
                          <td>
                          {{ $item->prodi->prodi }}
                          </td>
                          <td>
                          {{ $item->angkatan }}
                          </td>
                          <td>
                          {{ $item->jumlah }}
                          </td>
                          <td>
                            <a href="{{ route('kelas.show', $item->id) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>
                            </a>
                            <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('kelas.destroy', $item->id) }}" 
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