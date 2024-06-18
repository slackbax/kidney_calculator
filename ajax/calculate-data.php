<?php

function evaluate($i): string
{
  return match (true) {
    $i >= 90 => '1<span class="subtext">Condición normal</span>',
    $i >= 60 => '2<span class="subtext">Daño leve</span>',
    $i >= 45 => '3A<span class="subtext">Daño moderado</span>',
    $i >= 30 => '3B<span class="subtext">Daño moderado</span>',
    $i >= 15 => '4<span class="subtext">Daño severo</span>',
    default => '5<span class="subtext">Daño irreversible</span>'
  };
}

function get_image($i): string
{
  return match (true) {
    $i >= 90 => 'kidney_1.png',
    $i >= 60 => 'kidney_2.png',
    $i >= 30 => 'kidney_3.png',
    $i >= 15 => 'kidney_4.png',
    default => 'kidney_5.png'
  };
}

function get_text($i): array
{
  if ($i >= 90)
    return [
      'title' => 'Etapa 1',
      'desc' => 'La gran mayoría de personas con enfermedad renal crónica (ERC) temprana (etapas 1 y 2) vive con normalidad. Sin embargo, es importante hablar con tu doctor de cabecera antes de comenzar con nueva medicación, incluyendo cualquier suplemento como vitaminas o medicaciones de proveniencia natural o herbal. El tratamiento de ERC incluye mantener tu presión arterial en rangos normales y escoger un estilo de vida sano. [3]'
    ];
  else if ($i >= 60)
    return [
      'title' => 'Etapa 2',
      'desc' => 'La gran mayoría de personas con enfermedad renal crónica (ERC) temprana (etapas 1 y 2) vive con normalidad. Sin embargo, es importante hablar con tu doctor de cabecera antes de comenzar con nueva medicación, incluyendo cualquier suplemento como vitaminas o medicaciones de proveniencia natural o herbal. El tratamiento de ERC incluye mantener tu presión arterial en rangos normales y escoger un estilo de vida sano. [3]'
    ];
  else if ($i >= 30)
    return [
      'title' => 'Etapa 3',
      'desc' => 'El aumento del nivel de desechos como la UREA y Creatinina en la sangre es un indicador común de daño del riñón. Es posible que empieces a sentir malestares y notar cambios en el número de veces que orinas. A medida que la función renal disminuye, tu presión arterial puede aumentar. Un correcto tratamiento puede disminuir el progreso de la enfermedad del riñón y reducir posibles otras complicaciones. [3]'
    ];
  else if ($i >= 15)
    return [
      'title' => 'Etapa 4',
      'desc' => 'El aumento del nivel de desechos como la UREA y Creatinina en la sangre es un indicador común de daño del riñón. Es posible que empieces a sentir malestares y notar cambios en el número de veces que orinas. A medida que la función renal disminuye, tu presión arterial puede aumentar. Un correcto tratamiento puede disminuir el progreso de la enfermedad del riñón y reducir posibles otras complicaciones. [3]'
    ];
  else
    return [
      'title' => 'Etapa 5',
      'desc' => 'Incluso con el mejor tratamiento posible, ERC aveces deriva en la etapa 5 (o etapa final de enfermedad del riñón). En esta etapa, tu "equipo de cuidado" comenzará a hablar de tratamientos de diálisis contigo. [3]'
    ];
}

if (extract($_POST)):
  try {
    if ($age < 1 || $age > 120) {
      throw new Exception('La edad debe estar entre <strong>1 y 120 años</strong>.');
    }

    if ($creatin < 0.9 && $meas == 'umol') {
      throw new Exception('La creatinina no puede ser menor a<br><strong>0.8 μmol/l</strong>.');
    }

    if ($creatin < 0.01 && $meas == 'mgdl') {
      throw new Exception('La creatinina no puede ser menor a<br><strong>0.01 mg/dL</strong>.');
    }

    if ($meas == 'umol')
      $creatin *= 0.0113;

    if ($sex == 'M') {
      $sx = 1;
      $mdr_s = 1;

      $race_ind = ($afro == 'S') ? 163 : 141;
      $ind_a = 0.9;
      if ($creatin <= 0.9) {
        $ind_b = -0.411;
      } else {
        $ind_b = -1.209;
      }

    } else {
      $sx = 0;
      $mdr_s = 0.742;

      $race_ind = ($afro == 'S') ? 166 : 144;
      $ind_a = 0.7;
      if ($creatin <= 0.7) {
        $ind_b = -0.329;
      } else {
        $ind_b = -1.209;
      }

    }
    $ckd_raw = $race_ind * pow(($creatin / $ind_a), $ind_b) * pow(0.993, $age);
    $ckd = round($ckd_raw, 1);

    $rn = ($afro == 'S') ? 1.212 : 1;
    $mdr = round(175 * pow($creatin, -1.154) * pow($age, -0.203) * $mdr_s * $rn, 1);

    $term = (-0.2201 * ($age / 10 - 7.036)) + (0.2467 * ($sx - 0.5642)) - (0.5567 * ($ckd_raw / 5 - 7.222)) + (0.4510 * (log($creat_album) - 5.137));
    $tyr = round(100 * (1 - pow(0.9832, exp($term))), 2);
    $fyr = round(100 * (1 - pow(0.9365, exp($term))), 2);

    $response = [
      'status' => true,
      'image' => get_image($ckd),
      'ckd' => $ckd,
      'mdr' => $mdr,
      'stage_ckd' => evaluate($ckd),
      'stage_mdr' => evaluate($mdr),
      'text' => get_text($ckd),
      'twoyr' => $tyr,
      'fiveyr' => $fyr
    ];
    echo json_encode($response);
  } catch (Exception $e) {
    $response = ['status' => false, 'msg' => $e->getMessage()];
    echo json_encode($response);
  }
endif;