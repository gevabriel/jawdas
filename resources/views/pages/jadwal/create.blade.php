@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ url('jadwal/'. $id) }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title"></b>Tambah Jadwal Kuliah</b></h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('jadwal.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id_prodi" value="{{$id}}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Matakuliah</label>
                            <select class="form-control @error('id_matkul') is-invalid @enderror" id="exampleFormControlSelect1" name="id_matkul">
                              <option>-- Pilih Matakuliah --</option>
                              @foreach ($matkuls as $item)
                                <option value="{{ $item->id }}">{{$item->smt}} | {{ $item->matkul }} | {{$item->sks}} SKS</option>
                              @endforeach
                            </select>
                            @error('id_matkul') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kelas</label>
                            <select class="form-control @error('id_kelas') is-invalid @enderror" id="exampleFormControlSelect1" name="id_kelas">
                              <option>-- Pilih Kelas --</option>
                              @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                              @endforeach
                            </select>
                            @error('id_kelas') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Hari</label>
                            <select class="form-control @error('id_hari') is-invalid @enderror" id="exampleFormControlSelect1" name="id_hari">
                              <option>-- Pilih Hari --</option>
                              @foreach ($hari as $item)
                                <option value="{{ $item->id }}">{{ $item->hari }}</option>
                              @endforeach
                            </select>
                            @error('id_hari') <div class="text-muted">{{ $message }}</div> @enderror
                         </div>
                       </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jam</label>
                            <select class="form-control @error('id_jam') is-invalid @enderror" id="exampleFormControlSelect1" name="id_jam">
                              <option>-- Pilih Jam --</option>
                              @foreach ($jam as $item)
                                <option value="{{ $item->id }}">{{ $item->jam }}</option>
                              @endforeach
                            </select>
                            @error('id_jam') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Ruangan</label>
                            <select class="form-control @error('id_ruangan') is-invalid @enderror" id="exampleFormControlSelect1" name="id_ruangan">
                              <option>-- Pilih Ruangan --</option>
                              @foreach ($ruangans as $item)
                                <option value="{{ $item->id }}">{{ $item->ruangan }}</option>
                              @endforeach
                            </select>
                            @error('id_ruangan') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-dark pull-right">Tambah</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection