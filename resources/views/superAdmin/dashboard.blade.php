@extends('layouts.main')

@section('css')
@endsection

@section('js')
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <script>

    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Requests",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [
            @for($i=1; $i<=12; $i++)
              {{ $total_school_last_12_month[$i] }},
            @endfor
          ],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
@endsection

@section('content')
  <div class="row mb-4">
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-5 mb-0 text-uppercase font-weight-bold">Schools</p>
                <h3 class="font-weight-bolder">
                  {{ $total_school }}
                </h3>
                <p class="mb-0 text-xs">
                  Total schools registered
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-primary text-center rounded-circle">
                <i class="fa fa-school text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-5 mb-0 text-uppercase font-weight-bold">Administrators</p>
                <h3 class="font-weight-bolder">
                  {{ $total_administrator }}
                </h3>
                <p class="mb-0 text-xs">
                  Total administrators registered
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-7 mb-xl-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">School registration overview</h6>
          <p class="text-sm mb-0">
            <i class="fa {{ $shc_reg_percentage > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-danger' }}"></i>
            <span class="font-weight-bold">{{ $shc_reg_percentage }}% {{ $shc_reg_percentage > 0 ? 'more' : 'less' }}</span> in {{ date('Y') }}
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">New Schools</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            @foreach($schools as $sch)
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-primary shadow text-center">
                    <i class="fa fa-school text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm text-wrap">{{ $sch->sch_name }}</h6>
                    <span class="text-xs text-wrap">{{ $sch->total_administrator }} {{ $sch->total_administrator > 1 ? 'administrators' : 'administrator' }}</span>
                  </div>
                </div>
                <div class="d-flex">
                  <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"
                      href="{{ route('register_administrator', ['id_school' => Crypt::encrypt($sch->id_school)]) }}">
                    <i class="ni ni-bold-right text-primary" aria-hidden="true"></i>
                  </a>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12 mb-lg-0">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">New Administrators</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center">
            <tbody>
            @foreach($administrators as $admin)
            <tr>
              <td class="w-30">
                <div class="d-flex px-3 py-1 align-items-center">
                  <div>
                    <i class="ni ni-circle-08 fs-4 opacity-10" aria-hidden="true"></i>
                  </div>
                  <div class="ms-3">
                    <p class="text-xs font-weight-bold mb-0">Name:</p>
                    <h6 class="text-sm mb-0 text-wrap">{{ $admin->full_name }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <p class="text-xs font-weight-bold mb-0">School:</p>
                  <h6 class="text-sm mb-0 text-wrap">{{ $admin->school->sch_name }}</h6>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <p class="text-xs font-weight-bold mb-0">Position:</p>
                  <h6 class="text-sm mb-0 text-wrap">{{ $admin->position }}</h6>
                </div>
              </td>
              <td class="align-middle text-sm">
                <div class="col text-center">
                  <p class="text-xs font-weight-bold mb-0">Created:</p>
                  <h6 class="text-sm mb-0 text-wrap">{{ \Carbon\Carbon::parse($admin->created_at)->diffForHumans() }}</h6>
                </div>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
