$(document).ready(function () {
  $("input[data-bootstrap-switch]").each(function () {
    $(this).bootstrapSwitch('onColor', 'success')
    $(this).bootstrapSwitch('offColor', 'danger')
  })
  $('[data-toggle="tooltip"]').tooltip({html: true})
  $('.form-control').change(function () {
    if($(this).val() !== '') {
      $(this).removeClass('is-invalid')
    }
  })
})