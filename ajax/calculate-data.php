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
      'desc' => 'La mayoría de las personas con enfermedad renal crónica en etapa temprana vive con normalidad. Sin embargo, 
      es importante hablar con el doctor de cabecera antes de comenzar con una nueva medicación, suplemento alimenticio o vitaminas, 
      ya sea de origen natural, farmacéutico o herbal.<br><br>
      Se recomienda realizar chequeos médicos y exámenes de forma recurrente, pues en esta etapa, la enfermedad puede avanzar de forma silenciosa.<br><br>
      El tratamiento de ERC incluye mantener la presión arterial en rangos normales y escoger un estilo de vida saludable. [3]',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Lo que permitirá realizar eventuales ajustes de forma oportuna en el tratamiento.</li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario.</li> 
      <li><i class="fad fa-kidneys mr-2"></i><strong>Dieta saludable.</strong> Adopta una dieta equilibrada y baja en sal para ayudar a mantener la función renal y presión arterial controlada. Se recomienda pedir apoyo de nutricionista.</li> 
      <li><i class="fad fa-dumbbell mr-2"></i><strong>Ejercicio regular.</strong> Realiza ejercicio de forma regular para mantener un peso saludable y mejorar tu bienestar general.</li>
      <li><i class="fad fa-smoking-ban mr-2"></i><strong>No fumar.</strong> Evita fumar ya que puede afectar negativamente tus riñones.</li>
      <li><i class="fad fa-signal-alt-3 mr-2"></i><strong>Control del nivel de azúcar en sangre.</strong> Si tienes diabetes, es muy importante mantener tus niveles de azúcar en sangre dentro de los rangos recomendados.</li>
      <li><i class="fad fa-diploma mr-2"></i><strong>Educación y apoyo.</strong> Infórmate sobre lo que es la Enfermedad Renal Crónica y como prevenir su avance y evitar las complicaciones.</li>
      <li><i class="fad fa-syringe mr-2"></i><strong>Calendario de vacunas actualizadas.</strong> Asegúrate de tener todas las vacunas recomendadas por el Ministerio de Salud, porque la enfermedad renal crónica puede debilitar el sistema de defensa inmunológico.</li>
      </ol>'
    ];
  else if ($i >= 60)
    return [
      'title' => 'Etapa 2',
      'desc' => 'La mayoría de las personas con enfermedad renal crónica en etapa temprana vive con normalidad. Sin embargo, 
      es importante hablar con el doctor de cabecera antes de comenzar con una nueva medicación, suplemento alimenticio o vitaminas, 
      ya sea de origen natural, farmacéutico o herbal.<br><br>
      Se recomienda realizar chequeos médicos y exámenes de forma recurrente, pues en esta etapa, la enfermedad puede avanzar de forma silenciosa.<br><br>
      El tratamiento de ERC incluye mantener la presión arterial en rangos normales y escoger un estilo de vida saludable. [3]',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Lo que permitirá realizar eventuales ajustes de forma oportuna en el tratamiento.</li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario.</li> 
      <li><i class="fad fa-kidneys mr-2"></i><strong>Dieta saludable.</strong> Adopta una dieta equilibrada y baja en sal para ayudar a mantener la función renal y presión arterial controlada. Se recomienda pedir apoyo de nutricionista.</li> 
      <li><i class="fad fa-dumbbell mr-2"></i><strong>Ejercicio regular.</strong> Realiza ejercicio de forma regular para mantener un peso saludable y mejorar tu bienestar general.</li>
      <li><i class="fad fa-smoking-ban mr-2"></i><strong>No fumar.</strong> Evita fumar ya que puede afectar negativamente tus riñones.</li>
      <li><i class="fad fa-signal-alt-3 mr-2"></i><strong>Control del nivel de azúcar en sangre.</strong> Si tienes diabetes, es muy importante mantener tus niveles de azúcar en sangre dentro de los rangos recomendados.</li>
      <li><i class="fad fa-diploma mr-2"></i><strong>Educación y apoyo.</strong> Infórmate sobre lo que es la Enfermedad Renal Crónica y como prevenir su avance y evitar las complicaciones.</li>
      <li><i class="fad fa-syringe mr-2"></i><strong>Calendario de vacunas actualizadas.</strong> Asegúrate de tener todas las vacunas recomendadas por el Ministerio de Salud, porque la enfermedad renal crónica puede debilitar el sistema de defensa inmunológico.</li>
      </ol>'
    ];
  else if ($i >= 30)
    return [
      'title' => 'Etapa 3',
      'desc' => 'El aumento del nivel de desechos como la UREA y Creatinina en la sangre es un indicador común de daño del riñón. 
      Es posible comenzar a sentir malestares, como hinchazón de las piernas, dolores musculares y articulares, falta de ánimo, 
      disminución del apetito y cambios de gustos, náuseas y vómitos. También se pueden notar cambios en el número de veces que se 
      orina durante las noches. A medida que la función renal disminuye, tu presión arterial puede aumentar.<br><br>
      Un correcto tratamiento puede disminuir el progreso de la enfermedad del riñón y reducir posibles otras complicaciones.<br><br>
      En estas etapas es muy importante el control médico regular, así como la realización de los exámenes correspondientes para 
      detener o enlentecer la progresión y detectar complicaciones oportunamente. [3]',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Visita regularmente a tu médico nefrólogo para chequear la evolución y de requerirse ajustar el tratamiento. </li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales. Evita medicamentos que puedan ser tóxicos para los riñones, como ciertos analgésicos y antiinflamatorios. Consulta a tu médico para obtener una lista de medicamentos seguros.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación adecuada.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario. En algunas etapas avanzadas, es posible que necesites limitar la cantidad de líquidos al día.</li> 
      <li><i class="fad fa-kidneys mr-2"></i><strong>Dieta saludable renal.</strong> Mantén una dieta especial para la Enfermedad Renal Crónica, que incluye restricciones de proteínas, sal y otros alimentos con el fin de ayudar a mantener la función renal y la presión arterial bajo control. Se requiere consejería y control por profesional nutricionista.</li> 
      <li><i class="fad fa-dumbbell mr-2"></i><strong>Ejercicio regular.</strong> Se recomienda realizar ejercicio de forma regular adaptada a tus necesidades y condiciones de salud, para mejorar el bienestar general. Debes solicitar autorización a tu equipo médico tratante.</li>
      <li><i class="fad fa-smoking-ban mr-2"></i><strong>No fumar.</strong> Evita fumar ya que puede afectar negativamente tus riñones.</li>
      <li><i class="fad fa-signal-alt-3 mr-2"></i><strong>Control del nivel de azúcar en sangre.</strong> Si tienes diabetes, es muy importante mantener tus niveles de azúcar en sangre dentro de los rangos recomendados.</li>
      <li><i class="fad fa-diploma mr-2"></i><strong>Educación y apoyo.</strong> Infórmate sobre lo que es la Enfermedad Renal Crónica, cómo prevenir su avance y evitar las complicaciones. Mantente informado sobre tu condición médica y el tratamiento, así como tus derechos y deberes para la toma de decisiones informada en la etapa más avanzada de la ERC.</li>
      <li><i class="fad fa-notes-medical mr-2"></i><strong>Preparación para terapias avanzadas.</strong> Conoce las ventajas y desventajas de las opciones de tratamiento en la etapa 5 avanzada:
        <ul>
        <li>Trasplante renal.</li>
        <li>Diálisis en sus 2 modalidades hemo y peritoneodiálisis.</li>
        <li>Tratamiento conservador (que no considera la diálisis). Pide a tu equipo tratante más información.</li>
        </ul> 
      </li>
      <li><i class="fad fa-syringe mr-2"></i><strong>Calendario de vacunas actualizadas.</strong> Asegúrate de tener todas las vacunas recomendadas por el Ministerio de Salud, porque la enfermedad renal crónica puede debilitar el sistema de defensa inmunológico.</li>
      <li><i class="fad fa-user-friends mr-2"></i><strong>Apoyo psicológico y emocional.</strong> Considera buscar contención psicológica/espiritual o unirte a grupos de apoyo para personas con enfermedad renal crónica, ya que el manejo de la enfermedad puede ser emocionalmente un desafío.</li>
      </ol>'
    ];
  else if ($i >= 15)
    return [
      'title' => 'Etapa 4',
      'desc' => 'El aumento del nivel de desechos como la UREA y Creatinina en la sangre es un indicador común de daño del riñón. 
      Es posible comenzar a sentir malestares, como hinchazón de las piernas, dolores musculares y articulares, falta de ánimo, 
      disminución del apetito y cambios de gustos, náuseas y vómitos. También se pueden notar cambios en el número de veces que se 
      orina durante las noches. A medida que la función renal disminuye, tu presión arterial puede aumentar.<br><br>
      Un correcto tratamiento puede disminuir el progreso de la enfermedad del riñón y reducir posibles otras complicaciones.<br><br>
      En estas etapas es muy importante el control médico regular, así como la realización de los exámenes correspondientes para 
      detener o enlentecer la progresión y detectar complicaciones oportunamente. [3]',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Visita regularmente a tu médico nefrólogo para chequear la evolución y de requerirse ajustar el tratamiento. </li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales. Evita medicamentos que puedan ser tóxicos para los riñones, como ciertos analgésicos y antiinflamatorios. Consulta a tu médico para obtener una lista de medicamentos seguros.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación adecuada.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario. En algunas etapas avanzadas, es posible que necesites limitar la cantidad de líquidos al día.</li> 
      <li><i class="fad fa-kidneys mr-2"></i><strong>Dieta saludable renal.</strong> Mantén una dieta especial para la Enfermedad Renal Crónica, que incluye restricciones de proteínas, sal y otros alimentos con el fin de ayudar a mantener la función renal y la presión arterial bajo control. Se requiere consejería y control por profesional nutricionista.</li> 
      <li><i class="fad fa-dumbbell mr-2"></i><strong>Ejercicio regular.</strong> Se recomienda realizar ejercicio de forma regular adaptada a tus necesidades y condiciones de salud, para mejorar el bienestar general. Debes solicitar autorización a tu equipo médico tratante.</li>
      <li><i class="fad fa-smoking-ban mr-2"></i><strong>No fumar.</strong> Evita fumar ya que puede afectar negativamente tus riñones.</li>
      <li><i class="fad fa-signal-alt-3 mr-2"></i><strong>Control del nivel de azúcar en sangre.</strong> Si tienes diabetes, es muy importante mantener tus niveles de azúcar en sangre dentro de los rangos recomendados.</li>
      <li><i class="fad fa-diploma mr-2"></i><strong>Educación y apoyo.</strong> Infórmate sobre lo que es la Enfermedad Renal Crónica, cómo prevenir su avance y evitar las complicaciones. Mantente informado sobre tu condición médica y el tratamiento, así como tus derechos y deberes para la toma de decisiones informada en la etapa más avanzada de la ERC.</li>
      <li><i class="fad fa-notes-medical mr-2"></i><strong>Preparación para terapias avanzadas.</strong> Conoce las ventajas y desventajas de las opciones de tratamiento en la etapa 5 avanzada:
        <ul>
        <li>Trasplante renal.</li>
        <li>Diálisis en sus 2 modalidades hemo y peritoneodiálisis.</li>
        <li>Tratamiento conservador (que no considera la diálisis). Pide a tu equipo tratante más información.</li>
        </ul> 
      </li>
      <li><i class="fad fa-syringe mr-2"></i><strong>Calendario de vacunas actualizadas.</strong> Asegúrate de tener todas las vacunas recomendadas por el Ministerio de Salud, porque la enfermedad renal crónica puede debilitar el sistema de defensa inmunológico.</li>
      <li><i class="fad fa-user-friends mr-2"></i><strong>Apoyo psicológico y emocional.</strong> Considera buscar contención psicológica/espiritual o unirte a grupos de apoyo para personas con enfermedad renal crónica, ya que el manejo de la enfermedad puede ser emocionalmente un desafío.</li>
      </ol>'
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

    $tyr = '';
    $fyr = '';
    if (!empty($creat_album)) {
      $term = (-0.2201 * ($age / 10 - 7.036)) + (0.2467 * ($sx - 0.5642)) - (0.5567 * ($ckd_raw / 5 - 7.222)) + (0.4510 * (log($creat_album) - 5.137));
      $tyr = round(100 * (1 - pow(0.9832, exp($term))), 2);
      $fyr = round(100 * (1 - pow(0.9365, exp($term))), 2);
    }

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