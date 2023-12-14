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
                  <h4 class="card-title"><b>Edit Jadwal Kuliah</b></h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('jadwal.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="id_prodi" value="{{$item->id_prodi}}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Matakuliah</label>
                          <select class="form-control @error('id_matkul') is-invalid @enderror" id="exampleFormControlSelect1" name="id_matkul">
                            <option>-- Pilih Mata Kuliah--</option>
                            @foreach ($matkuls as $itemM)
                              @if ($item->id_matkul == $itemM->id)
                                <option value="{{ $itemM->id }}" selected>{{ $itemM->smt }} | {{ $itemM->matkul }} | {{ $itemM->sks }} SKS</option>
                              @else
                                <option value="{{ $itemM->id }}">{{ $itemM->smt }} | {{ $itemM->matkul }} | {{ $itemM->sks }} SKS</option>
                              @endif
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
                            @foreach ($kelas as $itemK)
                              @if ($item->id_kelas == $itemK->id)
                                <option value="{{ $itemK->id }}" selected>{{ $itemK->nama }}</option>
                              @else
                                <option value="{{ $itemK->id }}">{{ $itemK->nama }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_kelas') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
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
                            @foreach ($ruangans as $itemR)
                              @if ($item->id_ruangan == $itemR->id)
                                <option value="{{ $itemR->id }}" selected>{{ $itemR->ruangan }}</option>
                              @else
                                <option value="{{ $itemR->id }}">{{ $itemR->ruangan }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_ruangan') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-dark pull-right">Edit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection