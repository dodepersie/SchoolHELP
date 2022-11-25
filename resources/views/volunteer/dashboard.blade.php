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
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [
            @for($i=1; $i<=12; $i++)
              {{ $total_offer_last_12_month[$i] }},
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
    <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-5 mb-0 text-uppercase font-weight-bold">Total Offer</p>
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
    <div class="col-xl-4 col-sm-4 mb-xl-0">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-5 mb-0 text-uppercase font-weight-bold">Accepted</p>
                <h3 class="font-weight-bolder">
                  {{ $total_accepted }}
                </h3>
                <p class="mb-0 text-xs">
                  Total accepted offer
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-success text-center rounded-circle">
                <i class="fa fa-check text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-4 ">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="fs-5 mb-0 text-uppercase font-weight-bold">Pending</p>
                <h3 class="font-weight-bolder">
                  {{ $total_pending }}
                </h3>
                <p class="mb-0 text-xs">
                  Total pending offer
                </p>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-warning text-center rounded-circle">
                <i class="fa fa-clock text-lg opacity-10" aria-hidden="true"></i>
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
          <h6 class="text-capitalize">Offers Submitted overview</h6>
          <p class="text-sm mb-0">
            <i class="fa {{ $ofr_percentage > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-danger' }}"></i>
            <span class="font-weight-bold">{{ $ofr_percentage }}% {{ $ofr_percentage > 0 ? 'more' : 'less' }}</span> in {{ date('Y') }}
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
          <h6 class="mb-0">New Offers</h6>
        </div>
        <div class="card-body p-3">
          @if($total_offer < 1)
            <p class="text-center">There is no offer submitted</p>
          @endif
          <ul class="list-group">
            @foreach($offers as $ofr)
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 {{ $ofr->ofr_status == 'accepted' ? 'bg-gradient-success' : 'bg-gradient-warning'}} shadow text-center">
                    <i class="fa {{ $ofr->ofr_status == 'accepted' ? 'fa-check' : 'fa-clock'}} text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm text-wrap text-capitalize">{{ $ofr->assistance_request->req_type }} Request</h6>
                    <span class="text-xs text-wrap">{{ $ofr->ofr_remarks }}</span>
                  </div>
                </div>
                @if($ofr->ofr_status == 'pending')
                <div class="d-flex">
                  <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto btn-delete"
                     href="{{ route('assistance_request_delete_offer', ['id_offer' => \Illuminate\Support\Facades\Crypt::encrypt($ofr->id_offer)]) }}">
                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                  </a>
                </div>
                @endif
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
