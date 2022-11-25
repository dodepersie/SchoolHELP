<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="edit-request" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="edit-request">
          <i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Request
        </h1>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <form method="POST"
            action="{{ route('request_update', ['id_request' => \Illuminate\Support\Facades\Crypt::encrypt($edit->id_request)]) }}"
            accept-charset="utf-8"
            enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-4">
                <label class="col-form-label mt-3"><strong>Request Type : </strong></label>
              </div>
              <div class="col-8">
                <div class="btn-group mt-3" role="group">
                  @if($edit->req_type == 'tutorial')
                  <input id="type-tutorial" class="btn-check"
                         type="radio"
                         name="request_type" value="tutorial" checked>
                  <label for="type-tutorial" class="btn btn-outline-primary">Tutorial</label>

                  @else
                  <input id="type-resource" class="btn-check"
                         type="radio"
                         name="request_type" value="resource" checked>
                  <label for="type-resource" class="btn btn-outline-primary">Resource</label>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="input-description" class="col-form-label">Description</label>
            <textarea id="input-description" class="form-control"
                      type="text"
                      name="description" rows="4" required autofocus>{{ $edit->req_description }}</textarea>
          </div>
          @if($edit->req_type == 'tutorial')
          <div class="form-group">
            <label for="input-proposed-datetime" class="col-form-label">Proposed Date and Time</label>
            <input id="input-proposed-datetime" class="form-control"
                   type="datetime-local" step="1"
                   name="proposed_datetime" value="{{ $edit->req_proposed_datetime }}" required>
          </div>
          <div class="form-group">
            <label for="input-student-level" class="col-form-label">Student Level</label>
            <input id="input-student-level" class="form-control"
                   type="text"
                   name="student_level" value="{{ $edit->req_student_level }}" required>
          </div>
          <div class="form-group">
            <label for="input-no-of-student" class="col-form-label">Number of Student</label>
            <input id="input-no-of-student" class="form-control"
                   type="number" min="1"
                   name="no_of_student" value="{{ $edit->req_no_of_student }}" required>
          </div>
          @else
          <div class="form-group">
            <label for="input-resource-type" class="col-form-label">Resource Type</label>
            <select id="input-resource-type" class="form-control"
                    type="text"
                    name="resource_type" required>
              <option disabled>---[Select One]---</option>
              <option value="mobile_device" {{ $edit->req_resource_type == 'mobile_device' ? 'selected':'' }}>Mobile Device</option>
              <option value="personal_computer" {{ $edit->req_resource_type == 'personal_computer' ? 'selected':'' }}>Personal Computer</option>
              <option value="networking_equipment" {{ $edit->req_resource_type == 'networking_equipment' ? 'selected':'' }}>Networking Equipment</option>
            </select>
          </div>
          <div class="form-group">
            <label for="input-no-of-resource" class="col-form-label">Number of Resource</label>
            <input id="input-no-of-resource" class="form-control"
                   type="number"
                   name="no_of_resource" value="{{ $edit->req_no_of_resource }}" required>
          </div>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
