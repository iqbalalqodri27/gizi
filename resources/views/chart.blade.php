
            <!-- /.card -->
 @extends('master_app.app')
@section('title', ' Data Grafik')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>Data Anak</h1>/ --}}
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
        
        {{-- {{dd($monthsCount)}} --}}
        {{-- {{dd($months)}} --}}

       <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Data Posyandu</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  {{-- <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time </span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> --}}
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Status Gizi
                  </span>

                  {{-- <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span> --}}

                  
                </div>
              </div>
            </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script type='text/javascript'>
  var _ydata = {!! json_encode($labels) !!}
  var _xdata = {!! json_encode($data) !!}

</script>




@endsection
