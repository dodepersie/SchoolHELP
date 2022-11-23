var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}

$(document).ready(function () {
  var csrf_token = $('meta[name="csrf-token"]').attr('content');

  /* ===== Handle csrf token mismatch ===== */
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': csrf_token,
    }
  });

  /* ===== Logout ===== */
  $('.btn-sign-out').click(function (e) {
    e.preventDefault();
    var route = $(this).data('route');
    $(this).after('' +
      '<form id="logout-form" action="'+route+'" method="POST" class="d-none">' +
      '   <input type="hidden" name="_token" value="'+ csrf_token +'">' +
      '</form>'
    );
    $('#logout-form').submit();
  });

  /* ===== Modal form submit ===== */
  modal_form_validation();

  // if modal is closed, all input and error message removed
  $('.modal').on('hidden.bs.modal', function () {
    $(':input', this).val('').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $('label').removeClass('text-danger');
  });

  /* ===== Toggle Request Type ===== */
  $('#type-resource').click(function () {
    $('#input-proposed-datetime').prop('disabled', true).parent('div').addClass('d-none');
    $('#input-student-level').prop('disabled', true).parent('div').addClass('d-none');
    $('#input-no-of-student').prop('disabled', true).parent('div').addClass('d-none');

    $('#input-resource-type').prop('disabled', false).parent('div').removeClass('d-none');
    $('#input-no-of-resource').prop('disabled', false).parent('div').removeClass('d-none');
  });

  $('#type-tutorial').click(function () {
    $('#input-proposed-datetime').prop('disabled', false).parent('div').removeClass('d-none');
    $('#input-student-level').prop('disabled', false).parent('div').removeClass('d-none');
    $('#input-no-of-student').prop('disabled', false).parent('div').removeClass('d-none');

    $('#input-resource-type').prop('disabled', true).parent('div').addClass('d-none');
    $('#input-no-of-resource').prop('disabled', true).parent('div').addClass('d-none');
  });

  /* ===== Modal ===== */
  $('.data-table').on('click', '.btn-modal', function (e) {
    e.preventDefault();

    $.ajax({
      url: $(this).data('route'),
      type: 'GET',
      data: {},
      success: function (data) {
        $('#modal-container').html(data);
        $('#modal').modal('show');

        // form validation
        modal_form_validation();
      }
    });
  });

  /* ===== btn-delete ===== */
  $('.btn-delete').click(function (e) {
    e.preventDefault();

    $.ajax({
      url: $(this).attr('href'),
      type: 'delete',
      data: {
        _token: csrf_token,
      },
      success: function (data) {
        window.location.reload();
      }
    });
  });

  /* ===== Datatable ===== */
  $('.data-table').DataTable();
});

function modal_form_validation() {
  $('.modal').find('form').submit(function (e) {
    e.preventDefault();
    $(this).find('[type=submit]').prop('disabled', true);

    var form_action = $(this).attr('action');
    var method = $(this).attr('method');
    var form_data = $(this).serialize();
    $.ajax({
      url: form_action,
      type: method,
      data: form_data,
      success:function (data) {
        // error
        if (data) {
          // clear error
          $('.invalid-feedback').remove();
          $(':input').removeClass('is-invalid');
          $('label').removeClass('text-danger');

          // give error
          $.each(data, function (input_name, error_message) {
            $('[name="'+ input_name +'"]')
              .addClass('is-invalid')
              .after('' +
                '<span class="invalid-feedback" role="alert">\n' +
                '   <strong>'+ error_message[0] +'</strong>\n' +
                '</span>')
              .parents('.form-group').children('label').addClass('text-danger')
            ;
          });
          $('form').find('[type=submit]').removeAttr('disabled');
        }
        // success
        else {
          $('form').find('[type=submit]').removeAttr('disabled');
          window.location.reload();
        }
      },
    });
  });
}
