$(document).ready(function () {
  const $age = $('#age'), $sex = $('#sex'), $creatin = $('#creatin'), $meas = $('#meas'), $etnia = $('#afro'),
    $country = $('#country'), $region = $('#region'), $creatin_album = $('#creat_album'), $hiper = $('#hiper'), $diabetes = $('#diabetes'),
    $form = $('#form-kidney'), $res_div = $('#div_results')

  $('.number').keyup(function () {
    const val = $(this).val()
    $(this).val(val.replace(/[^\d.]+/g, ''))
  })

  $('.wrapper').on('click', '.text-ref', function () {
    const id = $(this).attr('id').split('_').shift()
    let count = 0
    $('html, body').animate({scrollTop: $(document).height()}, 1000);
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
        const field = [$age, $sex, $creatin, $meas, $etnia, $country, $region, $creatin_album, $hiper, $diabetes],
          msg = ['Edad', 'Sexo', 'Creatinina', 'Medida de la creatinina', 'Ascendencia', 'País', 'Región', 'Albúmina/Creatinina', 'Hipertensión', 'Diabetes']
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
          $age.val('')
          $sex.val('')
          $etnia.val('')
          $country.val('')
          $region.val('')
          $creatin.val('')
          $meas.val('')
          $creatin_album.val('')
          $hiper.val('')
          $diabetes.val('')
          $('#img_result').attr('src', 'dist/img/' + r.image);
          $('#efg_mdr').html(r.mdr)
          $('#efg_stage_mdr').html('Etapa ' + r.stage_mdr)
          $('#efg_ckd').html(r.ckd)
          $('#efg_stage_ckd').html('Etapa ' + r.stage_ckd)
          $('#result_text h5').html(r.text.title)
          $('#result_text span').html(r.text.desc)
          $('#collapseRecommendations .card-body').html(r.text.rec)
          if (parseFloat(r.ckd) < 30) {
            $('#trat_opt').css('display', 'block')
          } else {
            $('#trat_opt').css('display', 'none')
          }
          if (parseFloat(r.ckd) < 10) {
            $('#main_res').css('display', 'none')
            $('#sec_res .text').html('Los resultados de <span class="has-tooltip text-ref" id="kfre_ref">KFRE [2]</span> no han sido validados para un eGFR <strong>menor a 10 mL / min / 1.73 m<sup>2</sup></strong> (etapa 5 avanzada), por lo que no han sido calculados.')
            $('#sec_res').css('display', 'block')
          } else if (parseFloat(r.ckd) > 60) {
            $('#main_res').css('display', 'none')
            $('#sec_res .text').html('Los resultados de <span class="has-tooltip text-ref" id="kfre_ref">KFRE [2]</span> no han sido validados para un eGFR <strong>mayor a 60 mL / min / 1.73 m<sup>2</sup></strong> (etapas 1 a 2), por lo que no han sido calculados.')
            $('#sec_res').css('display', 'block')
          } else {
            if (r.twoyr !== '') {
              $('#main_res').css('display', 'block')
              $('#sec_res').css('display', 'none')
              $('#kfre2').html(r.twoyr)
              $('#kfre5').html(r.fiveyr)
            } else {
              $('#main_res').css('display', 'none')
              $('#sec_res .text').html('Los resultados de <span class="has-tooltip text-ref" id="kfre_ref">KFRE [2]</span> no pueden ser calculados sin haber ingresado el <strong>Ratio Albúmina/Creatinina en Orina</strong>.')
              $('#sec_res').css('display', 'block')
            }
          }
          $res_div.css('display', 'block')
          $('html, body').animate({
            scrollTop: $("#div_results").offset().top
          }, 1000);
        } else {
          $res_div.css('display', 'none')
          Swal.fire({
            icon: 'error',
            title: '¡Error!',
            html: r.msg,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3498db',
          })
        }
      }
    })
  })
})