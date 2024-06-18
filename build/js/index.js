$(document).ready(function () {
  const $age = $('#age'), $sex = $('#sex'), $creatin = $('#creatin'), $meas = $('#meas'), $etnia = $('#afro'),
    $form = $('#form-kidney'), $res_div = $('#div_results')

  $('.number').keyup(function () {
    const val = $(this).val()
    $(this).val(val.replace(/[^\d.]+/g, ''))
  })

  $('.text-ref').click(function() {
    const id = $(this).attr('id').split('_').shift()
    let count = 0
    $('html, body').animate({ scrollTop: $(document).height() }, 1000);
    let flashInterval = setInterval(function () {
      $('#' + id + '_link').toggleClass('border-orange')
      count++

      if (count === 6) {
        window.clearInterval(flashInterval);
      }
    }, 500)
  })

  $form.submit(function (e) {
    e.preventDefault()

    $(this).ajaxSubmit({
      url: 'ajax/calculate-data.php',
      type: 'post',
      dataType: 'json',
      beforeSubmit: function () {
        const field = [$age, $sex, $creatin, $meas, $etnia],
          msg = ['Edad', 'Sexo', 'Creatinina', 'Medida de la creatinina', 'Ascendencia']
        let error = ''

        field.forEach(function (item) {
          if (item.val() === '') {
            error += '- ' + msg[field.indexOf(item)] + '<br>'
            item.addClass('is-invalid')
          }
        })

        if (error.length > 0) {
          Swal.fire({
            icon: 'error',
            title: '<strong>¡Error!</strong>',
            html: 'Debes ingresar todos los datos solicitados:<br>' + error,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3498db',
          })
          return false
        }
      },
      success: function (r) {
        if (r.status) {
          $('#img_result').attr('src', 'dist/img/' + r.image);
          $('#efg_mdr').html(r.mdr)
          $('#efg_stage_mdr').html('Etapa ' + r.stage_mdr)
          $('#efg_ckd').html(r.ckd)
          $('#efg_stage_ckd').html('Etapa ' + r.stage_ckd)
          $('#result_text h5').html(r.text.title)
          $('#result_text span').html(r.text.desc)
          $('#kfre2').html(r.twoyr)
          $('#kfre5').html(r.fiveyr)
          $res_div.css('display', 'block')
          $('html, body').animate({
            scrollTop: $("#div_results").offset().top
          }, 1000);
        } else {
          $res_div.css('display', 'none')
          Swal.fire({
            icon: 'error',
            title: '<strong>¡Error!</strong>',
            text: r.msg,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3498db',
          })
        }
      }
    })
  })
})