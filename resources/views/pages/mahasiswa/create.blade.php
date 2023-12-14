@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('mahasiswa.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title"><b>Tambah Mahasiswa</b></h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nim</label>
                          <input type="text" class="form-control" name="nim" value="{{ old('nim') }}" 
                            class="form-control @error('nim') is-invalid @enderror">
                            @error('nim') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" 
                            class="form-control @error('nama') is-invalid @enderror">
                            @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" value="" 
                            class="form-control @error('password') is-invalid @enderror">
                            @error('password') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="password" class="form-control" name="password_confirmation" value="" 
                            class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password2') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" 
                            class="form-control @error('tempat_lahir') is-invalid @enderror">
                            @error('tempat_lahir') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" 
                            class="form-control @error('tanggal_lahir') is-invalid @enderror">
                            @error('tanggal_lahir') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control" name="alamat"value="{{ old('alamat') }}" 
                            class="form-control @error('alamat') is-invalid @enderror">
                            @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Program Studi</label>
                            <select class="form-control @error('id_prodi') is-invalid @enderror" id="exampleFormControlSelect1" name="id_prodi">
                              <option>-- Pilih Program Studi --</option>
                              @foreach ($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                              @endforeach
                            </select>
                            @error('id_prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Angkatan</label>
                            <select class="form-control @error('id_kelas') is-invalid @enderror" id="exampleFormControlSelect1" name="id_kelas">
                              <option>-- Pilih Angkatan --</option>
                              @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                              @endforeach
                            </select>
                            @error('id_kelas') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Photo</label>
                            <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="exampleFormControlFile1" name="photo">
                            @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn pull-right">Tambah</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection