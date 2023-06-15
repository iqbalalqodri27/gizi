@extends('master_app.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Ibu</h1>
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
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                       {{Session::get('success')}}
                     </div>
                    @endif
                    @if (Session::has('successUpdate'))
                    <div class="alert alert-warning" role="alert">
                       {{Session::get('successUpdate')}}
                     </div>
                    @endif
                    @if (Session::has('successDelete'))
                    <div class="alert alert-secondary " role="alert">
                       {{Session::get('successDelete')}}
                     </div>
                    @endif
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        <a class="btn btn-success" id="tampil-data" data-toggle="modal" data-target="#modal-lg">+ Tambah
                            Data Ibu</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA IBU</th>
                                    <th>NIK</th>
                                    <th>ALAMAT IBU</th>
                                    <th>NO.TELPON</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($mothers->count() > 0)
                                @foreach ($mothers as $mother)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="align-middle">{{$mother->nama}}</td>
                                    <td class="align-middle">{{$mother->nik}}</td>
                                    <td class="align-middle">{{$mother->alamat}}</td>
                                    <td class="align-middle">{{$mother->no_tlp}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal{{$mother->id}}">Edit</a> | |
                                        <form class="d-inline" action="{{route('dataibu.destroy',$mother->id)}}" method="POST" onsubmit="return confirm('delete data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal{{$mother->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Ibu</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                                              data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                            <div class="modal-body">
                                                    <form class="" action="{{route('dataibu.update',$mother->id)}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Nama Ibu</label>
                                                            <input type="hidden" name='id' class="form-control"
                                                                value="<?php echo $mother['id']; ?>">
                                                            <input type="text" name='nama' class="form-control"
                                                                value="<?php echo $mother['nama']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">NIK</label>
                                                            <textarea class="form-control" name="nik"
                                                                rows="5"><?php echo $mother['nik']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Alamat</label>
                                                            <input type="text" name='alamat' class="form-control"
                                                                value="<?php echo $mother['alamat']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">No Telpon</label>
                                                            <input type="text" class="form-control" name='no_tlp'
                                                                value="<?php echo $mother['no_tlp']; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="6">Data Ibu 0</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA IBU</th>
                                    <th>NIK</th>
                                    <th>ALAMAT IBU</th>
                                    <th>NO.TELPON</th>
                                    <th>AKSI</th>
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

{{-- modal tambah data ibu --}}
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-tambah" class="modal-title">Tambah Data Ibu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{Route('dataibu.store')}}" method="POST">
                    @csrf
                    <div id="modal-tambah" class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="number" name="nik" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" name="alamat" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Telpon</label>
                            <div class="col-sm-8">
                                <input type="number" name="no_tlp" class="form-control">
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- modal tambah data ibu --}}




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
@endsection