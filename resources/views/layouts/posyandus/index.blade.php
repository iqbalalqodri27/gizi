@extends('master_app.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Posyandu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Berat Badan</th>
                  <th>tinggi Badan</th>
                  <th>Lingkar Kepala</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>35,4</td>
                  <td>100 cm</td>
                  <td>10,3 cm</td>
                  <td>edit || hapus</td>
                </tr>

                <tr>
                  <td>40,4</td>
                  <td>120 cm</td>
                  <td>13,1 cm</td>
                  <td>edit || hapus</td>
                </tr>


                </tbody>
                <tfoot>
                <tr>
                  <th>Berat Badan</th>
                  <th>tinggi Badan</th>
                  <th>ALAMAT IBU</th>
                  <th>Lingkar Kepala</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection