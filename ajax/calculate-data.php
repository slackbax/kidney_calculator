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
      'desc' => 'La gran mayoría de las personas con enfermedad renal crónica (ERC) en etapas 1 y 2, vive con normalidad y no presenta síntomas o signos, 
      pudiendo avanzar a etapas más avanzadas en forma silenciosa. Por tanto es importante los chequeos médicos y exámenes para detectar y controlar 
      oportunamente alguna complicación. [3]<br><br>
      <i>Estas recomendaciones son generales para ayudarte a llevar una vida más saludable y a proteger la función de tus riñones. Es siempre necesario 
      que las converses con tu equipo médico tratante cuando asistas a tus controles habituales.</i>',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Lo que permitirá realizar eventuales ajustes de forma oportuna en el tratamiento.</li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario.</li> 
      <li><i class="fad fa-apple-alt mr-2"></i><strong>Dieta saludable.</strong> Adopta una dieta equilibrada y baja en sal para ayudar a mantener la función renal y presión arterial controlada. Se recomienda pedir apoyo de nutricionista.</li> 
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
      'desc' => 'La gran mayoría de las personas con enfermedad renal crónica (ERC) en etapas 1 y 2, vive con normalidad y no presenta síntomas o signos, 
      pudiendo avanzar a etapas más avanzadas en forma silenciosa. Por tanto es importante los chequeos médicos y exámenes para detectar y controlar 
      oportunamente alguna complicación. [3]',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Lo que permitirá realizar eventuales ajustes de forma oportuna en el tratamiento.</li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario.</li> 
      <li><i class="fad fa-apple-alt mr-2"></i><strong>Dieta saludable.</strong> Adopta una dieta equilibrada y baja en sal para ayudar a mantener la función renal y presión arterial controlada. Se recomienda pedir apoyo de nutricionista.</li> 
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
      'desc' => 'Las personas con enfermedad renal crónica (ERC) en etapas 3 y 4 pueden presentar síntomas o signos progresivamente por disminución de 
      la función renal. Los más frecuentes son el aumento de la presión arterial, edema (hinchazón) en las piernas, dolores musculares y articulares, 
      falta de ánimo, disminución del apetito y cambios del gusto, náuseas y vómitos, y aumento de la orina (especialmente nocturna).<br><br>
      En estas etapas es muy importante el control médico regular, así como la realización de los exámenes correspondientes para detener o enlentecer 
      la progresión y detectar complicaciones oportunamente. [3]<br><br>
      <i>Estas recomendaciones son generales para ayudarte a llevar una vida más saludable y a proteger la función de tus riñones. Es siempre necesario 
      que las converses con tu equipo médico tratante cuando asistas a tus controles habituales.</i>',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Visita regularmente a tu médico nefrólogo para chequear la evolución y de requerirse ajustar el tratamiento. </li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales. Evita medicamentos que puedan ser tóxicos para los riñones, como ciertos analgésicos y antiinflamatorios. Consulta a tu médico para obtener una lista de medicamentos seguros.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación adecuada.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario. En algunas etapas avanzadas, es posible que necesites limitar la cantidad de líquidos al día.</li> 
      <li><i class="fad fa-apple-alt mr-2"></i><strong>Dieta saludable renal.</strong> Mantén una dieta especial para la Enfermedad Renal Crónica, que incluye restricciones de proteínas, sal y otros alimentos con el fin de ayudar a mantener la función renal y la presión arterial bajo control. Se requiere consejería y control por profesional nutricionista.</li> 
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
      'desc' => 'Las personas con enfermedad renal crónica (ERC) en etapas 3 y 4 pueden presentar síntomas o signos progresivamente por disminución de 
      la función renal. Los más frecuentes son el aumento de la presión arterial, edema (hinchazón) en las piernas, dolores musculares y articulares, 
      falta de ánimo, disminución del apetito y cambios del gusto, náuseas y vómitos, y aumento de la orina (especialmente nocturna).<br><br>
      En estas etapas es muy importante el control médico regular, así como la realización de los exámenes correspondientes para detener o enlentecer 
      la progresión y detectar complicaciones oportunamente. [3]<br><br>
      <i>Estas recomendaciones son generales para ayudarte a llevar una vida más saludable y a proteger la función de tus riñones. Es siempre necesario 
      que las converses con tu equipo médico tratante cuando asistas a tus controles habituales.</i>',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Visita regularmente a tu médico nefrólogo para chequear la evolución y de requerirse ajustar el tratamiento. </li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales. Evita medicamentos que puedan ser tóxicos para los riñones, como ciertos analgésicos y antiinflamatorios. Consulta a tu médico para obtener una lista de medicamentos seguros.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación adecuada.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario. En algunas etapas avanzadas, es posible que necesites limitar la cantidad de líquidos al día.</li> 
      <li><i class="fad fa-apple-alt mr-2"></i><strong>Dieta saludable renal.</strong> Mantén una dieta especial para la Enfermedad Renal Crónica, que incluye restricciones de proteínas, sal y otros alimentos con el fin de ayudar a mantener la función renal y la presión arterial bajo control. Se requiere consejería y control por profesional nutricionista.</li> 
      <li><i class="fad fa-dumbbell mr-2"></i><strong>Ejercicio regular.</strong> Se recomienda realizar ejercicio de forma regular adaptada a tus necesidades y condiciones de salud, para mejorar el bienestar general. Debes solicitar autorización a tu equipo médico tratante.</li>
      <li><i class="fad fa-smoking-ban mr-2"></i><strong>No fumar.</strong> Evita fumar ya que puede afectar negativamente tus riñones.</li>
      <li><i class="fad fa-signal-alt-3 mr-2"></i><strong>Control del nivel de azúcar en sangre.</strong> Si tienes diabetes, es muy importante mantener tus niveles de azúcar en sangre dentro de los rangos recomendados.</li>
      <li><i class="fad fa-diploma mr-2"></i><strong>Educación y apoyo.</strong> Infórmate sobre lo que es la Enfermedad Renal Crónica, cómo prevenir su avance y evitar las complicaciones. Mantente informado sobre tu condición médica y el tratamiento, así como tus derechos y deberes para la toma de decisiones informada en la etapa más avanzada de la ERC.</li>
      <li><i class="fad fa-notes-medical mr-2"></i><strong>Preparación para terapias avanzadas.</strong> Conoce las ventajas y desventajas de las opciones de tratamiento en la etapa 5 avanzada:
        <ul>
        <li>Trasplante renal.</li>
        <li>Diálisis en sus 2 modalidades, hemo y peritoneodiálisis.</li>
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
      'desc' => 'En la etapa 5 de la ERC, la función del riñón está disminuida y es insuficiente para satisfacer las necesidades vitales del medio interno 
      y la eliminación de toxinas del organismo. Las personas pueden presentar exacerbación de los síntomas o signos ya descritos en las recomendaciones de las etapas 3 y 4.<br><br>
      En conjunto con la familia y su equipo médico deberá optar por alguna de las siguientes opciones:
      <ul>
        <li>Diálisis en alguna de las 2 modalidades hemo y peritoneodiálisis</li>
        <li>Trasplante renal, tratamiento conservador (que no considera la diálisis). Pide a tu equipo tratante mayor información.</li>
      </ul>
      La diálisis (hemo o peritoneodiálisis) y el trasplante renal son prestaciones de la patología GES (FONASA) Insuficiencia Renal Crónica Terminal, 
      las cuales son de acceso universal para todos los pacientes en nuestro país, independiente de la edad y condición socioeconómica. Además son sujetos 
      de garantía de protección financiera. [3]<br><br>
      <i>Estas recomendaciones son generales para ayudarte a llevar una vida más saludable y a proteger la función de tus riñones. Es siempre necesario 
      que las converses con tu equipo médico tratante cuando asistas a tus controles habituales.</i>',
      'rec' => '<ol>
      <li><i class="fad fa-user-md mr-2"></i><strong>Consulta médica periódica.</strong> Visita regularmente a tu médico nefrólogo para chequear la evolución y de requerirse ajustar el tratamiento. </li>
      <li><i class="fad fa-capsules mr-2"></i><strong>Medicamentos.</strong> Consulta a tu médico antes de usar cualquier medicamento nuevo, suplemento, vitamina o productos naturales. Evita medicamentos que puedan ser tóxicos para los riñones, como ciertos analgésicos y antiinflamatorios. Consulta a tu médico para obtener una lista de medicamentos seguros.</li> 
      <li><i class="fad fa-tint mr-2"></i><strong>Presión arterial controlada.</strong> Mantén tu presión arterial en niveles saludables cumpliendo las indicaciones de tu médico, sobre todo en medicamentos recetados.</li>
      <li><i class="fad fa-glass mr-2"></i><strong>Hidratación adecuada.</strong> Bebe suficiente agua diariamente. Lo recomendado son 2 litros, a menos que tu médico indique lo contrario. En algunas etapas avanzadas, es posible que necesites limitar la cantidad de líquidos al día.</li> 
      <li><i class="fad fa-apple-alt mr-2"></i><strong>Dieta saludable renal.</strong> Mantén una dieta especial para la Enfermedad Renal Crónica, que incluye restricciones de proteínas, sal y otros alimentos con el fin de ayudar a mantener la función renal y la presión arterial bajo control. Se requiere consejería y control por profesional nutricionista.</li> 
      <li><i class="fad fa-dumbbell mr-2"></i><strong>Ejercicio regular.</strong> Se recomienda realizar ejercicio de forma regular adaptada a tus necesidades y condiciones de salud, para mejorar el bienestar general. Debes solicitar autorización a tu equipo médico tratante.</li>
      <li><i class="fad fa-smoking-ban mr-2"></i><strong>No fumar.</strong> Evita fumar ya que puede afectar negativamente tus riñones.</li>
      <li><i class="fad fa-signal-alt-3 mr-2"></i><strong>Control del nivel de azúcar en sangre.</strong> Si tienes diabetes, es muy importante mantener tus niveles de azúcar en sangre dentro de los rangos recomendados.</li>
      <li><i class="fad fa-diploma mr-2"></i><strong>Educación sobre la ERC.</strong> Infórmate sobre lo que es la Enfermedad Renal Crónica, cómo prevenir su avance y evitar las complicaciones. Mantente informado sobre tu condición médica y las opciones de tratamiento.</li>
      <li><i class="fad fa-tasks mr-2"></i><strong>Derechos y deberes.</strong> Es muy importante que estes informado de tus derechos (laborales, previsionales, subsidios, ayudas estatales y municipales), así como tus deberes para la toma de decisiones informada en la etapa más avanzada de la ERC. Se recomienda conversar con tu equipo tratante y/o trabajador social local.</li>
      <li><i class="fad fa-notes-medical mr-2"></i><strong>Terapias en la etapa ERC avanzada.</strong> En esta etapa es necesario que ya este definido una de las 4 opciones de tratamiento:
        <ul>
        <li>Trasplante renal.</li>
        <li>Diálisis en sus 2 modalidades, hemo y peritoneodiálisis.</li>
        <li>Tratamiento conservador (que no considera la diálisis). Pide a tu equipo tratante más información.</li>
        </ul> 
      </li>
      <li><i class="fad fa-syringe mr-2"></i><strong>Calendario de vacunas actualizadas.</strong> Asegúrate de tener todas las vacunas recomendadas por el Ministerio de Salud, porque la enfermedad renal crónica puede debilitar el sistema de defensa inmunológico. Sigue las recomendaciones de higiene y cuidado adecuadas para prevenir infecciones o accidentes, especialmente si tienes una fístula o catéter para diálisis.</li>
      <li><i class="fad fa-user-friends mr-2"></i><strong>Apoyo psicológico y emocional.</strong> Considera buscar contención psicológica/espiritual o unirte a grupos de apoyo para personas con enfermedad renal crónica, ya que el manejo de la enfermedad puede ser emocionalmente un desafío.</li>
      <li><i class="fad fa-kidneys mr-2"></i><strong>Preparación y educación para diálisis.</strong> Si tu opción fuera diálisis, aprende sobre el procedimiento, ventajas/desventajas, manejo de la dieta, líquidos y los posibles efectos secundarios. Solicita sesiones de educación pre-diálisis.</li>
      <li><i class="fad fa-thermometer mr-2"></i><strong>Manejo de los síntomas de insuficiencia renal.</strong> En la etapa 5 puede debutar con síntomas severos (por ejemplo náuseas, vómitos, fatiga, cansancio y dificultad para respirar, limitación para mantenerse despierto, calambres, presión arterial muy alta). Requiere pronta evaluación por equipo tratante o bien traslado a un servicio de urgencia.</li>
      <li><i class="fad fa-siren-on mr-2"></i><strong>Manejo del dolor y calidad de vida.</strong> Si existiera dolor, conversa siempre con tu equipo médico, para un tratamiento oportuno, especialmente cuando es crónico. Respecto a la calidad de vida, chequea con tu equipo tu nivel actual y cómo mejorar. Considera terapias complementarias y paliativas si fuese necesario.</li>
      <li><i class="fad fa-atom-alt mr-2"></i><strong>Tratamiento de la anemia.</strong> La anemia es común en la ERC etapa 5. Pudieras necesitar suplementos de fierro, eritropoyetina (EPO) o transfusiones de sangre para manejar la anemia.</li>
      <li><i class="fad fa-bone mr-2"></i><strong>Manejo del metabolismo de los huesos.</strong> Se debe controlar los niveles de calcio, fósforo, vitamina D y paratohormona (PTH). Es posible que necesites medicación para corregir eventuales desequilibrios de alguno de ellos.</li>
      <li><i class="fad fa-first-aid mr-2"></i><strong>Monitoreo y tratamiento de la Acidosis Metabólica.</strong> Esta alteración es común en la ERC etapa 5. El tratamiento puede incluir bicarbonato de sodio para mantener el equilibrio ácido-base.</li>
      </ol>'
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