<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="detail-offer" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="detail-offer">
          <i class="fas fa-info-circle"></i>&nbsp;&nbsp; Detail Offer
        </h1>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
            <tr>
              <td>Date</td>
              <td>:</td>
              <th>{{ $detail->created_at }}</th>
            </tr>
            <tr>
              <td>Remarks</td>
              <td>:</td>
              <th class="text-wrap">{{ $detail->ofr_remarks }}</th>
            </tr>
            <tr>
              <td>Name</td>
              <td>:</td>
              <th>{{ $detail->user->full_name }}</th>
            </tr>
            <tr>
              <td>Age</td>
              <td>:</td>
              @php
                $year = $detail->user->age;
              @endphp
              <th>{{ $year > 1 ? $year.' years old' : $year.' year old' }}</th>
            </tr>
            <tr>
              <td>Occupation</td>
              <td>:</td>
              <th>{{ $detail->user->occupation }}</th>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        @if($detail->ofr_status == 'pending')
        <a class="btn btn-success" href="{{ route('request_accept_offer', ['id_offer' => \Illuminate\Support\Facades\Crypt::encrypt($detail->id_offer)]) }}">Accept</a>
        @endif
      </div>
    </div>
  </div>
</div>
