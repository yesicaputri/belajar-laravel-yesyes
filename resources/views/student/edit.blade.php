@extends('template.master')

@section('judul')
    <h1>Manajemen Siswa</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Info Konfirmasi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/student/{{ $showSiswaById->id }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNIS">Nomor Indux Siswa</label>
                    <input type="text" name="nis" class="form-control" id="inputNIS" placeholder="Enter Nomor Indux Siswa" value="{{ $showSiswaById->nomor_induk_siswa }}" disabled >
                  @error('nis')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                  @enderror
                </div>

                  <div class="form-group">
                    <label for="inputNama">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Enter Nama Siswa" value="{{ $showSiswaById->nama }}" require>
                    @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="inputAlamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Enter Alamat" value="{{ $showSiswaById->alamat }}" require>
                    @error('alamat')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin">
                    <option value="L" disabled {{ $showSiswaById->jenis_kelamin == "L" ? "selected" : "" }}>Laki-laki</option>
                    <option value="P" disabled {{ $showSiswaById->jenis_kelamin == "P" ? "selected" : "" }}>Perempuan</option>
                  </select>
                </div>
                @error('jenis_kelamin')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection