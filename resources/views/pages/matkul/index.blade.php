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
            <a type="submit" href="{{ route('matkul.create') }}" class="btn btn-dark pull-right">Tambah</a>
            <div class="clearfix"></div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title "><b>Data Mata Kuliah</b></h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text">
                        <th>
                          <b>ID</b>
                        </th>
                        <th>
                          <b>Kode Mata Kuliah</b>
                        </th>
                        <th>
                          <b>Mata Kuliah</b>
                        </th>
                        <th>
                          <b>SKS</b>
                        </th>
                        <th>
                          <b>Semester</b>
                        </th>
                        <th>
                          <b>Program Studi</b>
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
                          {{ $item->kode }}
                          </td>
                          <td>
                          {{ $item->matkul }}
                          </td>
                          <td>
                          {{ $item->sks }}
                          </td>
                          <td>
                          {{ $item->smt }}&nbsp;({{ $item->semester }})
                          </td>
                          <td>
                          {{ $item->prodi->prodi }}
                          </td>
                          <td>
                            <a href="{{ route('matkul.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('matkul.destroy', $item->id) }}" 
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