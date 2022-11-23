@extends('layouts.main')

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('js')
  <script type="text/javascript" charset="utf8"
          src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection

@section('content')
  {{-- modal create school --}}
  @include('admin.request.create')

  <div class="card mb-4">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col-6 d-flex align-items-center">
          <h4>
            <i class="fa fa-file-text-o me-3"></i>
            <small>Requests</small>
          </h4>
        </div>
        <div class="col-6 text-end">
          <button type="button" class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#modal-request-assistance">
            <i class="fas fa-plus"></i>&nbsp;&nbsp; Add
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table data-table">
          <thead>
          <tr class="text-dark">
            <th width="20">No</th>
            <th>Admin</th>
            <th>Description</th>
            <th width="60">Type</th>
            <th width="60">Status</th>
            <th width="100">Action</th>
          </tr>
          </thead>
          <tbody class="text-sm">
          @for($i=0; $i<count($list_requests); $i++)
            @php
              $id_request = \Illuminate\Support\Facades\Crypt::encrypt($list_requests[$i]->id_request);
            @endphp
            <tr>
              <td>{{ $i+1 }}</td>
              <td>{{ $list_requests[$i]->admin->full_name }}</td>
              <td>{{ $list_requests[$i]->req_description }}</td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm w-100 {{ $list_requests[$i]->req_type == 'tutorial' ? 'bg-primary' : 'bg-secondary' }}">
                  {{ $list_requests[$i]->req_type }}
                </span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm w-100 {{ $list_requests[$i]->req_status == 'new' ? 'bg-gradient-success' : 'bg-gradient-danger' }}">
                  {{ $list_requests[$i]->req_status }}
                </span>
              </td>
              <td class="d-flex justify-content-evenly">
                <a class="text-center mx-2"
                   href="{{ route('request_detail', ['id_request' => $id_request]) }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="View Details">
                  <i class="fa fa-file-text-o text-dark"></i>
                </a>
                <a class="text-center mx-2 btn-modal"
                   href="javascript:;"
                   data-route="{{ route('request_edit', ['id_request' => $id_request]) }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="Edit Request">
                  <i class="fa fa-edit text-primary"></i>
                </a>
                @if($list_requests[$i]->req_status == 'new')
                  <a class="text-center mx-2"
                     href="{{ route('request_close', ['id_request' => $id_request]) }}"
                     data-bs-toggle="tooltip"
                     data-bs-placement="bottom"
                     title="Close">
                    <i class="fa fa-times text-danger"></i>
                  </a>
                @endif
              </td>
            </tr>
          @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
