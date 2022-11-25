<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="submit-offer" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="submit-offer">
          <i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Submit Offer
        </h1>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <form method="POST"
            action="{{ route('assistance_request_store_offer', ['id_request' => $id_request]) }}"
            accept-charset="utf-8"
            enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="input-remarks" class="col-form-label">Remarks</label>
            <textarea id="input-remarks" class="form-control" type="text" name="remarks" rows="4" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
