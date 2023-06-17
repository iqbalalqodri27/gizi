@extends('master_app.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Anak</h1>
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
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        <a class="btn btn-success" id="tampil-data" data-toggle="modal" data-target="#modal-lg">+ Tambah
                            Data Anak</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA ANAK</th>
                                    <th>NIK ANAK</th>
                                    <th>TEMPAT LAHIR</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>USIA</th>
                                    <th>JENIS KELAMIN </th>
                                    <th>NAMA IBU </th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($childs->count() > 0)
                                @foreach ($childs as $child)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="align-middle">{{$child->nama}}</td>
                                    <td class="align-middle">{{$child->nik}}</td>
                                    <td class="align-middle">{{$child->tempat_lahir}}</td>
                                    <td class="align-middle">{{$child->tanggal_lahir}}</td>
                                    <td class="align-middle">{{$child->usia}} Bulan</td>
                                    <td class="align-middle">
                                        @if ($child->jenis_kelamin == 'L')
                                            Laki - Laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td class="align-middle">{{$child->mothers->nama}}</td>
                                    {{-- <td class="align-middle">{{$child->mothers->nik}}</td>
                                    <td class="align-middle">{{$child->mothers->alamat}}</td>
                                    <td class="align-middle">{{$child->mothers->no_tlp}}</td> --}}
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal{{$child->id}}">Edit</a> | |
                                        <form class="d-inline" action="{{route('dataanak.destroy',$child->id)}}"
                                            method="POST" onsubmit="return confirm('delete data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="6">Data Anak 0</td>
                                </tr>
                                @endif
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
                <h4 id="modal-tambah" class="modal-title">Tambah Data Anak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{Route('dataanak.store')}}" method="POST">
                    @csrf
                    <div id="modal-tambah" class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Anak</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">NIK Anak</label>
                            <div class="col-sm-8">
                                <input type="number" name="nik" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                          <div class="icheck-success d-inline">
                            <input type="radio" name="jenis_kelamin" checked id="radioSuccess1" value="L">
                            
                            <label for="radioSuccess1">
                                Laki-Laki
                            </label>
                          </div>
                          <div class="icheck-success d-inline">
                            <input type="radio" name="jenis_kelamin" id="radioSuccess2" value="P">
                            
                            <label for="radioSuccess2">
                                Perempuan 
                            </label>
                          </div>
                      </div>


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Usia</label>
                            <div class="col-sm-8">
                                <input type="text" name="usia" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ibu</label>
                            <div class="col-sm-8">
                            <select name="mothers_id" class="form-control select2" id="mothers_id"  style="width: 100%;">
                              <option value="0">Pilih Nama Ibu</option> 
                              @foreach ($mothers as $data)
                            <option value="{{$data->id  }}">{{$data->nama}}</option>                         
                              @endforeach
                            </select>                   
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