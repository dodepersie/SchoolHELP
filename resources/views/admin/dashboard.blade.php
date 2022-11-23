@extends('layouts.main')

@section('css')
@endsection

@section('js')
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <script>
    function chart(id_chart, data_chart, label_chart, border_color) {
      var ctx = document.getElementById(id_chart).getContext("2d");

      var gradientStroke1 = ctx.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
      gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
      new Chart(ctx, {
        type: "line",
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: label_chart,
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5e72e4",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: data_chart,
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
    }
    var data_request = [0,0,0,0,0,0,0,0,0,0,0,0];
    @for($i=1; $i<=12; $i++)
      data_request[{{ $i-1 }}] = {{ $total_request_last_12_month[$i] }};
    @endfor
    chart('chart-request', data_request, "Request");

    var data_offer = [0,0,0,0,0,0,0,0,0,0,0,0];
    @for($i=1; $i<=12; $i++)
      data_offer[{{ $i-1 }}] = {{ $total_offer_last_12_month[$i] }};
    @endfor
    chart('chart-offer', data_offer, "Offer");
  </script>
@endsection

@section('content')
  <div class="row mb-4">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-6 mb-0 text-uppercase font-weight-bold">Total Requests</p>
                <h3 class="font-weight-bolder">
                  {{ $total_request }}
                </h3>
                <p class="mb-0 text-xs">
                  Total request submitted
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-info text-center rounded-circle">
                <i class="fa fa-file-text-o text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-6 mb-0 text-uppercase font-weight-bold">Tutorial Requests</p>
                <h3 class="font-weight-bolder">
                  {{ $total_request_tutorial }}
                </h3>
                <p class="mb-0 text-xs">
                  Total tutorial request
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-primary text-center rounded-circle">
                <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-6 mb-0 text-uppercase font-weight-bold">Resource Requests</p>
                <h3 class="font-weight-bolder">
                  {{ $total_request_resource }}
                </h3>
                <p class="mb-0 text-xs">
                  Total resource request
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-secondary text-center rounded-circle">
                <i class="fa fa-laptop text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-6 mb-0 text-uppercase font-weight-bold">Total Offers</p>
                <h3 class="font-weight-bolder">
                  {{ $total_offer }}
              </h3>
                <p class="mb-0 text-xs">
                  Total offer submitted
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-danger text-center rounded-circle">
                <i class="fas fa-hand-holding-heart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Request Submitted Overview</h6>
          <p class="text-sm mb-0">
            <i class="fa {{ $req_percentage > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-danger' }}"></i>
            <span class="font-weight-bold">{{ $req_percentage }}% {{ $req_percentage > 0 ? 'more' : 'less' }}</span> in {{ date('Y') }}
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-request" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">New Requests</h6>
        </div>
        <div class="card-body p-3">
          @if($total_request < 1)
            <p class="text-center">There is no request submitted</p>
          @endif
          <ul class="list-group">
            @foreach($requests as $req)
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 {{ $req->req_type == 'tutorial' ? 'bg-gradient-primary' : 'bg-gradient-secondary'}} shadow text-center">
                    <i class="fa {{ $req->req_type == 'tutorial' ? 'fa-user' : 'fa-laptop'}} text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm text-wrap text-capitalize">{{ $req->req_type }} <span class="text-xs text-normal text-wrap ms-1">({{ $req->total_offer }} {{ $req->total_offer > 1 ? 'Offers' : 'Offer' }})</span></h6>
                    <span class="text-xs text-wrap">{{ $req->req_description }}</span>
                  </div>
                </div>
                <div class="d-flex">
                  <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"
                  href="{{ route('request_detail', ['id_request' => \Illuminate\Support\Facades\Crypt::encrypt($req->id_request)]) }}">
                  <i class="ni ni-bold-right text-dark" aria-hidden="true"></i>
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
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Offer Received Overview</h6>
          <p class="text-sm mb-0">
            <i class="fa {{ $offer_percentage > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-danger' }}"></i>
            <span class="font-weight-bold">{{ $offer_percentage }}% {{ $offer_percentage > 0 ? 'more' : 'less' }}</span> in {{ date('Y') }}
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-offer" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">New Offers</h6>
        </div>
        <div class="card-body p-3">
          @if($total_offer < 1)
            <p class="text-center">There is no offer submitted</p>
          @endif
          <ul class="list-group">
            @foreach($offers as $offer)
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 {{ $offer->ofr_status == 'accepted' ? 'bg-gradient-success' : 'bg-gradient-warning' }} shadow text-center">
                    <i class="fa {{ $offer->ofr_status == 'accepted' ? 'fa-check' : 'fa-clock' }} text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm text-wrap text-capitalize"><span class="{{ $offer->ofr_status == 'accepted' ? 'text-success' : 'text-warning' }}">{{ $offer->ofr_status }}</span> Offer</h6>
                    <span class="text-xs text-wrap">{{ $offer->ofr_remarks }}</span>
                  </div>
                </div>
                <div class="d-flex">
                  <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"
                     href="{{ route('request_detail', ['id_request' => \Illuminate\Support\Facades\Crypt::encrypt($offer->id_request)]) }}">
                    <i class="ni ni-bold-right text-dark" aria-hidden="true"></i>
                  </a>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
