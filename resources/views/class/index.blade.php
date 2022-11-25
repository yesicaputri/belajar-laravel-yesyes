@extends('template.master')

@section('judul')
    <h1>Ini Halaman Kelas</h1>
@endsection

@section('content')

    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Halaman Data Table</h3>
    </div>
    <div class="card-body">
    <div class="card-body">
        <a href="{{ route('classCreate') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i>
          Class Create
        </a>
      </div>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama Kelas</th>
            <th>Jurusan</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
            @forelse ($dataKelas as $item=>$value)
          <tr>
            <td>{{ $item + 1 }}</td>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nama_kelas }}</td>
            <td>{{ $value->jurusan }}</td>
            <td>
              <a class="btn btn-info mr-3" href="class/{{$value->id}}">Detail</a>
              <a class="btn btn-warning mr-3" href="class/{{$value->id}}/edit">Edit</a>
              <form action="/class/{{$value->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td>Data Masih Kosong</td>
          </tr>

          @endforelse
        </table>
      </div>
      <!-- /.card-body -->
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
       $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
@endpush