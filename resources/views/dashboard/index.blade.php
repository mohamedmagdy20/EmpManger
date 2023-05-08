@extends('dashboard')
@section('content')
<div class="row">
  @if (auth()->user()->hasPermission('show_reports'))
  <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="mb-2 text-dark font-weight-normal">@lang('lang.employees')</h5>
        <h2 class="mb-4 text-dark font-weight-bold">{{$employees}}</h2>

        <div class="text-center"><i style="font-size: 25px" class="fa fa-users  text-danger"></i></div>
        {{-- <p class="mt-4 mb-0">@lang('lang.number_of') @lang('lang.employees')</p> --}}
      </div>
    </div>
  </div>

  <div class="col-xl-4  col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="mb-2 text-dark font-weight-normal">@lang('lang.users')</h5>
        <h2 class="mb-4 text-dark font-weight-bold">{{$users}}</h2>
        <div class="text-center"><i style="font-size: 25px" class="fa fa-user  text-success"></i></div>
     
        {{-- <p class="mt-4 mb-0">@lang('lang.number_of') @lang('lang.users')</p> --}}
        {{-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">35%</h3> --}}
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="mb-2 text-dark font-weight-normal">@lang('lang.job')</h5>
        <h2 class="mb-4 text-dark font-weight-bold">{{$jobs}}</h2>
        
        <div class="text-center"><i style="font-size: 25px" class="fa-solid fa-briefcase"></i></div>
    
        {{-- <p class="mt-4 mb-0">@lang('lang.number_of') @lang('lang.job')</p> --}}
        {{-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">25%</h3> --}}
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="mb-2 text-dark font-weight-normal">@lang('lang.new')</h5>
        <h2 class="mb-4 text-dark font-weight-bold">{{$new}}</h2>

        <div class="text-center"><i style="font-size: 25px" class="fa-solid fa-newspaper text-success"></i></div>
        {{-- <p class="mt-4 mb-0">@lang('lang.number_of') @lang('lang.employees')</p> --}}
      </div>
    </div>
  </div>

  <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="mb-2 text-dark font-weight-normal">@lang('lang.rl')</h5>
        <h2 class="mb-4 text-dark font-weight-bold">{{$rl}}</h2>
        <div class="text-center"><i style="font-size: 25px" class="fa-solid fa-database text-secondary"></i></div>
     
        {{-- <p class="mt-4 mb-0">@lang('lang.number_of') @lang('lang.users')</p> --}}
        {{-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">35%</h3> --}}
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="mb-2 text-dark font-weight-normal">@lang('lang.da')</h5>
        <h2 class="mb-4 text-dark font-weight-bold">{{$da}}</h2>
        
        <div class="text-center"><i style="font-size: 25px" class="fa-solid fa-house-chimney-crack text-danger"></i></div>
    
        {{-- <p class="mt-4 mb-0">@lang('lang.number_of') @lang('lang.job')</p> --}}
        {{-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">25%</h3> --}}
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="mb-2 text-dark font-weight-normal">@lang('lang.renewal')</h5>
        <h2 class="mb-4 text-dark font-weight-bold">{{$renawal}}</h2>
        
        <div class="text-center"><i style="font-size: 25px" class="fa-solid fa-briefcase"></i></div>
    
        {{-- <p class="mt-4 mb-0">@lang('lang.number_of') @lang('lang.job')</p> --}}
        {{-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">25%</h3> --}}
      </div>
    </div>
  </div>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      {{-- <div class="card-body text-center"> --}}
        <canvas id="gender-chart"></canvas>
      {{-- </div> --}}
    </div>
  </div>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      {{-- <div class="card-body text-center"> --}}
        <canvas id="request-chart"></canvas>
      {{-- </div> --}}
    </div>
  </div>
    
  @endif
  </div>
  {{-- <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title mb-0">Recent Activity</h4>
                <div class="dropdown dropdown-arrow-none">
                  <button class="btn p-0 text-dark dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuIconButton1">
                    <h6 class="dropdown-header">Settings</h6>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-4 grid-margin  grid-margin-lg-0">
              <div class="wrapper pb-5 border-bottom">
                <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                  <p class="mb-0 text-dark">Total Profit</p>
                  <span class="text-success"><i class="mdi mdi-arrow-up"></i>2.95%</span>
                </div>
                <h3 class="mb-0 text-dark font-weight-bold">$ 92556</h3>
                <canvas id="total-profit"></canvas>
              </div>
              <div class="wrapper pt-5">
                <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                  <p class="mb-0 text-dark">Expenses</p>
                  <span class="text-success"><i class="mdi mdi-arrow-up"></i>52.95%</span>
                </div>
                <h3 class="mb-4 text-dark font-weight-bold">$ 59565</h3>
                <canvas id="total-expences"></canvas>
              </div>
            </div>
            <div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0">
              <div class="pl-0 pl-lg-4 ">
                <div class="d-xl-flex justify-content-between align-items-center mb-2">
                  <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                    <h3 class="text-dark font-weight-bold mr-2 mb-0">Devices sales</h3>
                    <h5 class="mb-0">( growth 62% )</h5>
                  </div>
                  <div class="d-lg-flex">
                    <p class="mr-2 mb-0">Timezone:</p>
                    <p class="text-dark font-weight-bold mb-0">GMT-0400 Eastern Delight Time</p>
                  </div>
                </div>
                <div class="graph-custom-legend clearfix" id="device-sales-legend"></div>
                <canvas id="device-sales"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 grid-margin stretch-card">
      <div class="card card-danger-gradient">
        <div class="card-body mb-4">
          <h4 class="card-title text-white">Account Retention</h4>
          <canvas id="account-retension"></canvas>
        </div>
        <div class="card-body bg-white pt-4">
          <div class="row pt-4">
            <div class="col-sm-6">
              <div class="text-center border-right border-md-0">
                <h4>Conversion</h4>
                <h1 class="text-dark font-weight-bold mb-md-3">$306</h1>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="text-center">
                <h4>Cancellation</h4>
                <h1 class="text-dark font-weight-bold">$1,520</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-8  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-xl-flex justify-content-between mb-2">
            <h4 class="card-title">Page views analytics</h4>
            <div class="graph-custom-legend primary-dot" id="pageViewAnalyticLengend"></div>
          </div>
          <canvas id="page-view-analytic"></canvas>
        </div>
      </div>
    </div>
  </div> --}}
   
@endsection 

@section('js')
<script>
  
const chartData = async () => {
    const response = await fetch('/gender');
    const data = await response.json();
    return data;
};

const renderChart = async () => {
    const data = await chartData();

    const ctx = document.getElementById('gender-chart').getContext('2d');
    // alert(ctx)
    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['@lang('lang.male')', '@lang('lang.female')'],
            datasets: [{
                data: [data.male, data.female],
                backgroundColor: ['#3498db', '#e74c3c'],
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: '@lang('lang.gender')',
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        }
    });
};

const reqeustData = async()=>{
    const response = await fetch('/request-chart');
    const data = await response.json();
    return data; 
}

const requestChart = async () => {
    const data = await reqeustData();

    const ctx = document.getElementById('request-chart').getContext('2d');
    // alert(ctx)
    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['@lang('lang.new')', '@lang('lang.on_process')', '@lang('lang.finished')'],
            datasets: [{
                data: [data.new, data.on_process, data.finish],
                backgroundColor: ['#3498db', '#e74c3c','#333'],
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: '@lang('lang.requests')',
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        }
    });
};


renderChart();
requestChart();


</script>
@stop