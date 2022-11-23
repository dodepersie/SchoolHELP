<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="edit-school" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="edit-school">
          <i class="fas fa-edit"></i>&nbsp;&nbsp; Edit School
        </h1>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <form method="POST"
            action="{{ route('update_school', ['id_school' => \Illuminate\Support\Facades\Crypt::encrypt($edit->id_school)]) }}"
            accept-charset="utf-8"
            enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="input-school-name" class="col-form-label">School Name</label>
            <input id="input-school-name" class="form-control"
                   type="text"
                   name="school_name" value="{{ $edit->sch_name }}" required autofocus>
          </div>
          <div class="form-group">
            <label for="input-city" class="col-form-label">City</label>
            <input id="input-city" class="form-control"
                   type="text"
                   name="city" value="{{ $edit->sch_city }}" required>
          </div>
          <div class="form-group">
            <label for="input-address" class="col-form-label">Address</label>
            <textarea id="input-address" class="form-control"
                      type="text"
                      name="address" rows="4" required>{{ $edit->sch_address }}</textarea>
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
