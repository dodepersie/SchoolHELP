<div class="modal fade" id="modal-request-assistance" tabindex="-1" aria-labelledby="request-assistance" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="request-assistance">
          <i class="fas fa-plus"></i>&nbsp;&nbsp; Add Request
        </h1>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <form method="POST"
            action="{{ route('request_store') }}"
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
                  <input id="type-tutorial" class="btn-check" type="radio" name="request_type" value="tutorial" checked>
                  <label for="type-tutorial" class="btn btn-outline-primary">Tutorial</label>

                  <input id="type-resource" class="btn-check" type="radio" name="request_type" value="resource">
                  <label for="type-resource" class="btn btn-outline-primary">Resource</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="input-description" class="col-form-label">Description</label>
            <textarea id="input-description" class="form-control" type="text" name="description" rows="4" required autofocus></textarea>
          </div>
          <div class="form-group">
            <label for="input-proposed-datetime" class="col-form-label">Proposed Date and Time</label>
            <input id="input-proposed-datetime" class="form-control" type="datetime-local" step="1" name="proposed_datetime" required>
          </div>
          <div class="form-group">
            <label for="input-student-level" class="col-form-label">Student Level</label>
            <input id="input-student-level" class="form-control" type="text" name="student_level" required>
          </div>
          <div class="form-group">
            <label for="input-no-of-student" class="col-form-label">Number of Student</label>
            <input id="input-no-of-student" class="form-control" type="number" min="1" name="no_of_student" required>
          </div>
          <div class="form-group d-none">
            <label for="input-resource-type" class="col-form-label">Resource Type</label>
            <select id="input-resource-type" class="form-control" type="text" name="resource_type" required disabled>
              <option disabled selected>---[Select One]---</option>
              <option value="mobile_device">Mobile Device</option>
              <option value="personal_computer">Personal Computer</option>
              <option value="networking_equipment">Networking Equipment</option>
            </select>
          </div>
          <div class="form-group d-none">
            <label for="input-no-of-resource" class="col-form-label">Number of Resource</label>
            <input id="input-no-of-resource" class="form-control" type="number" name="no_of_resource" required disabled>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
