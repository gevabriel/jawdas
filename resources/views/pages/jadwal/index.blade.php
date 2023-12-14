@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title "><b>Jadwal Kuliah Akademik</b></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text">
                        <th>
                          <b>No</b>
                        </th>
                        <th>
                          <b>Kode Program Studi</b>
                        </th>
                        <th>
                          <b>Program Studi</b>
                        </th>
                        <th>
                         <b>Jenjang</b>
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
                          {{ $item->kode_prodi }}
                          </td>
                          <td>
                          {{ $item->prodi }}
                          </td>
                          <td>
                          {{ $item->jenjang }}
                          </td>
                          <td>
                            <a href="{{ route('jadwal.show', $item->id) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>
                            </a>
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