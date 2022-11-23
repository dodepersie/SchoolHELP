<div class="modal fade" id="modal-add-admin" tabindex="-1" aria-labelledby="add-admin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="add-admin">
          <i class="fas fa-plus"></i>&nbsp;&nbsp; Add Administrator
        </h1>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <form method="POST"
            action="{{ route('register_administrator_store', ['id_school' => $id_school]) }}"
            accept-charset="utf-8"
            enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="input-staff-id" class="col-form-label">Staff ID</label>
            <input id="input-staff-id" class="form-control" type="text" name="staff_id" required autofocus>
          </div>
          <div class="form-group">
            <label for="input-full-name" class="col-form-label">Full Name</label>
            <input id="input-full-name" class="form-control" type="text" name="full_name" required autocomplete="name">
          </div>
          <div class="form-group">
            <label for="input-username" class="col-form-label">Username</label>
            <input id="input-username" class="form-control" type="text" name="username" required autocomplete="username">
          </div>
          <div class="form-group">
            <label for="input-email" class="col-form-label">Email Address</label>
            <input id="input-email" class="form-control" type="email" name="email" required autocomplete="email">
          </div>
          <div class="form-group">
            <label for="input-phone-number" class="col-form-label">Phone Number</label>
            <input id="input-phone-number" class="form-control" type="tel" name="phone_number" required autocomplete="tel">
          </div>
          <div class="form-group">
            <label for="input-position" class="col-form-label">Position</label>
            <input id="input-position" class="form-control" type="text" name="position" required>
          </div>
          <div class="form-group">
            <label for="input-password" class="col-form-label">Password</label>
            <input id="input-password" class="form-control" type="password" name="password" required autocomplete="new-password">
          </div>
          <div class="form-group">
            <label for="input-password-confirm" class="col-form-label">Confirm Address</label>
            <input id="input-password-confirm" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
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
