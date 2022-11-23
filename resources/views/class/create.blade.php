@extends('template.master')

@section('judul')
    <h1>Manajemen Kelas</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/class" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputid">Id</label>
                    <input type="integer" name="id" class="form-control" id="inputid" placeholder="Enter Id">
                  </div>

                  <div class="form-group">
                    <label for="inputNamaKelas">Nama Kelas</label>
                    <input type="text" name="namakelas" class="form-control" id="inputNamaKelas" placeholder="Enter Nama Kelas">
                  </div>

                  <div class="form-group">
                    <label for="inputJurusan">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" id="inputJurusan" placeholder="Enter Jurusan">
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