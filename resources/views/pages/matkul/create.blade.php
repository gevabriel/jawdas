@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('matkul.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header">
                  <h3 class="card-title"><b>Tambah Mata Kuliah</b></h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('matkul.store') }}" method="POST">
                  @csrf
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Mata Kuliah</label>
                          <input type="text" class="form-control" name="kode" value="{{ old('kode') }}" 
                            class="form-control @error('kode') is-invalid @enderror">
                            @error('kode') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mata Kuliah</label>
                          <input type="text" class="form-control" name="matkul" value="{{ old('matkul') }}" 
                            class="form-control @error('matkul') is-invalid @enderror">
                            @error('matkul') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">SKS</label>
                          <input type="text" class="form-control" name="sks" value="{{ old('sks') }}" 
                            class="form-control @error('sks') is-invalid @enderror">
                            @error('sks') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                              <label for="exampleFormControlSelect1">Semester</label>
                              <select class="form-control @error('smt') is-invalid @enderror" id="exampleFormControlSelect1" name="smt">
                                <option>-- Pilih Semester --</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                              </select>
                              @error('smt') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
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