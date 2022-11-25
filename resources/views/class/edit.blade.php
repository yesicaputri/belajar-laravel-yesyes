@extends('template.master')

@section('judul')
    <h1>Manajemen Kelas</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Info Konfir Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/class/{{ $showKelasById->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputid">Id</label>
                    <input type="integer" name="id" class="form-control" id="inputid" placeholder="Enter Id" value="{{ $showKelasById->id }}" require>
                    @error('id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                  
                  <div class="form-group">
                    <label for="inputNamaKelas">Nama Kelas</label>
                    <input type="text" name="namakelas" class="form-control" id="inputNamaKelas" placeholder="Enter Nama Kelas" value="{{ $showKelasById->nama_kelas }}" require>
                    @error('namakelas')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="inputJurusan">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" id="inputJurusan" placeholder="Enter Jurusan" value="{{ $showKelasById->jurusan }}" require>
                    @error('jurusan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection