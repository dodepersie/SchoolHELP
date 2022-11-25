<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="detail-request" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="detail-request">
          <i class="fa fa-info-circle"></i>&nbsp;&nbsp; Detail Request
        </h1>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
          @if($detail->req_type == 'tutorial')
          <tr>
            <td>Tutorial Date and Time</td>
            <td>:</td>
            <th>{{ $detail->proposed_datetime }}</th>
          </tr>
          <tr>
            <td>Student Level</td>
            <td>:</td>
            <th>{{ $detail->req_student_level }}</th>
          </tr>
          <tr>
            <td>Number of Student</td>
            <td>:</td>
            <th>{{ $detail->req_no_of_student }}</th>
          </tr>
          @else
          <tr>
            <td>Resource Type</td>
            <td>:</td>
            <th>{{ ucwords(str_replace('_', ' ', $detail->req_resource_type)) }}</th>
          </tr>
          <tr>
            <td>Number Required</td>
            <td>:</td>
            <th>{{ $detail->req_no_of_resource }}</th>
          </tr>
          @endif
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
