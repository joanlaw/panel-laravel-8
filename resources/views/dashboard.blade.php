@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  NÚMERO DE USUARIOS</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Número de productos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$products->count()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

     
    </div>
    <div class="row">
      <div class="col-6">
      <div class="alert alert-danger" role="alert">
        Last Connection
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Usuaria</th>
            <th scope="col">IP</th>
            <th scope="col"> Cuándo ?</th>
            
          </tr>
        </thead>
        <tbody>
        
          <tr>
            <td>{{\App\Models\User::find($last->user_id)->email}} {{\App\Models\User::find($last->user_id)->name}}</td>
            <td>{{$last->ip}}</td>
            <td>{{$last->created_at}}</td>
            
          </tr>
        
          
        </tbody>
      </table>
    </div>
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      
      <!-- Pie Chart -->
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div id="container"></div>
          <!-- Card Body -->
          
        </div>
      </div>
    </div>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">nombre</th>
            <th scope="col">ip</th>
            <th scope="col">Navegador</th>
          </tr>
        </thead>
        <tbody>
          @foreach($statistics as $statistic)
          <tr>
            <th scope="row">{{$statistic->product->name}}</th>
            <td>{{$statistic->user->name}}</td>
            <td>{{$statistic->ip}}</td>
            <td>{{$statistic->details}}</td>
            
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>

    <!-- Content Row -->
   

  </div>

  <script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var userData = <?php echo json_encode($userData)?>;
    Highcharts.chart('container', {
        title: {
            text: 'New User Growth'
        },
        subtitle: {
            text: 'Source: positronx.io'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endsection