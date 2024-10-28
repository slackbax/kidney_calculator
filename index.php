<?php
require 'src/settings.php';
require 'src/constants.php';
require 'src/functions.php';
extract($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRT Biobío - Cálculo de función renal</title>
  <?php //include 'src/favicon.php' ?>
  <?php include 'src/styles.php' ?>
</head>

<body class="hold-transition layout-boxed layout-footer-fixed">
<section class="content" id="main-screen">
  <div class="wrapper">
    <div class="row">
      <div class="col-12">
        <div class="text-center mt-3">
          <a href="https://www.crtbiobio.cl"><img alt="CRT Biobio" src="dist/img/logo_crt.png" style="height:50px"></a>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-head">
    <div class="wrapper mt-4">
      <div class="row">
        <div class="alert mt-4">
          <h3>¿Cómo están mis riñones?</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="wrapper">
    <div class="row">
      <div class="alert mt-4">
        <h5 class="font-weight-bold mb-3">¿Qué necesitas para calcular tu función renal?</h5>
        <p>
          La función renal se puede estimar con ecuaciones matemáticas (MDRD-4 y CKD- EPI), que utilizan datos como edad, sexo y el nivel de creatinina en sangre para
          aproximar la real capacidad de filtrar los desechos de la sangre.
        </p>
        <p class="text-bold">
          ¿Es posible estimar el riesgo de progresar la enfermedad e ingresar a diálisis?
        </p>
        <p>
          Si cuenta además con el examen de orina Razón Albuminuria/Creatininuria (RAC o microalbuminuria), se puede adicionalmente estimar el riesgo de que una
          persona con enfermedad renal crónica (ERC) necesite diálisis o trasplante renal en los próximos 2 o 5 años (Ecuación de Riesgo de Insuficiencia Renal, KFRE).
          Si desea conocer la función estimada de sus riñones y/o el riesgo de progresión KFRE, ingrese los datos en el siguiente formulario y se recomienda siempre
          informar el resultado a su médico tratante para decidir el plan de tratamiento.
        </p>
      </div>

      <div class="card border-0 bg-info pb-4">
        <form id="form-kidney">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-4">
                <label for="age"><i class="fad fa-clock mr-2"></i>Edad</label>
                <div class="input-group">
                  <input type="text" name="age" id="age" class="form-control text-right number" autocomplete="off">
                  <div class="input-group-append">
                    <span class="input-group-text">años</span>
                  </div>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="sex"><i class="fad fa-venus-mars mr-2"></i>Sexo</label>
                <div class="input-group">
                  <select class="form-control" name="sex" id="sex">
                    <option value="">Selecciona sexo</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="creatin"><i class="fad fa-kidneys mr-2"></i><span class="has-tooltip" data-toggle="tooltip" data-placement="right" data-html="true" title="Dependiendo del laboratorio que hace el análisis, puede ser medida en Miligramos por Decilitro (mg/dL) o Micromoles por Litro (μmol/l)">Creatinina</span></label>
                <div class="input-group">
                  <input type="text" name="creatin" id="creatin" class="form-control text-right number" autocomplete="off">
                  <div class="input-group-append">
                    <select class="form-control" name="meas" id="meas">
                      <option value=""></option>
                      <option value="mgdl">mg/dL</option>
                      <option value="umol">μmol/l</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group col-md-4 offset-md-2">
                <label for="afro"><i class="fad fa-user-friends mr-2"></i><span class="has-tooltip" data-toggle="tooltip" data-placement="right" data-title="Persona que es hijo o nieto, o de parentesco africano que nace fuera del continente africano.">¿Es afrodescendiente?</span></label>
                <div class="input-group">
                  <select class="form-control" name="afro" id="afro">
                    <option value="">Selecciona opción</option>
                    <option value="S">Sí</option>
                    <option value="N">No</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <label for="creat_album"><i class="fad fa-glass-whiskey-rocks mr-2"></i><span class="has-tooltip" data-toggle="tooltip" data-placement="right" data-html="true" title="Necesaria para el cálculo de KFRE">Ratio Albúmina/Creatinina en Orina</span></label>
                <div class="input-group">
                  <input type="text" name="creat_album" id="creat_album" class="form-control text-right number" autocomplete="off">
                  <div class="input-group-append">
                    <span class="input-group-text">mg/g</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-md-4 offset-md-4 text-center">
                <button type="submit" class="btn btn-block btn-lg btn-warning">Calcular
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="mt-4" id="div_results" style="display:none">
      <div class="row">
        <div class="col-12 text-center">
          <h3>Tus resultados</h3>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-5 offset-md-1 text-center">
          <span class="title-mini">ETAPA</span>
        </div>
        <div class="col-md-6 text-center">
          <span class="title-mini">eGFR</span>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1">
          <img id="img_result" src="dist/img/kidney_1.png" alt="kidney" style="width:100%">
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-12 text-center text-bold mt-4">
              <h1><span id="efg_ckd" class="text-info mr-2"></span><sup style="font-size: 16px">mL/min/1.73 m2</sup>
              </h1>
              <h4 class="mb-0" id="efg_stage_ckd"></h4>
              <small class="text-info has-tooltip text-ref" id="ckd_ref">Creatinina estandarizada CKD-EPI 2009 [1]</small>
            </div>

            <div class="col-12 text-center text-bold mt-5">
              <h1><span id="efg_mdr" class="text-info mr-2"></span><sup style="font-size: 16px">mL/min/1.73 m2</sup>
              </h1>
              <h4 class="mb-0" id="efg_stage_mdr"></h4>
              <small class="text-info has-tooltip text-ref" id="mdr_ref">Creatinina no estandarizada MDRD-4 IDMS [2]</small>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 offset-md-1 mt-md-0 mt-5">
          <div id="result_text" class="alert alert-info shadow">
            <h5></h5>
            <span></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 offset-md-3 mt-3">
          <button class="btn btn-block btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseRecommendations" aria-expanded="false">
            <i class="fa fa-plus mr-2"></i>Ver recomendaciones
          </button>
        </div>
        <div class="col-md-10 offset-md-1 mt-3">
          <div id="collapseRecommendations" class="collapse">
            <div class="card card-body"></div>
          </div>
        </div>
      </div>

      <div id="main_res">
        <div class="row mt-5">
          <div class="col-10 offset-md-1 text-center">
            <h4>KFRE: Ecuación de predicción de Riesgo Progresión a insuficiencia renal</h4>
          </div>
          <div class="col-10 offset-md-1">
            <p>La Ecuación de Riesgo de Insuficiencia Renal (KFRE) es una herramienta que ayuda a
              predecir el riesgo de que una persona con enfermedad renal crónica (ERC) pudiera
              necesitar diálisis o trasplante renal en los próximos 2 o 5 años.
              Para calcular el KFRE, se necesita la siguiente información:</p>
            <ul>
              <li class="text-default">Edad y sexo de la persona.</li>
              <li class="text-default">Exámenes de laboratorio: la Velocidad de Filtración Glomerular estimada (VFGe) y
                la Razón Albuminuria/Creatininuria.
              </li>
            </ul>
            <p>Estos datos se pueden obtener en cualquier consultorio de la red de salud.
              El KFRE permite a los médicos y al paciente junto a su familia tomar decisiones
              importantes sobre el tratamiento de la enfermedad renal.
            </p>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-12 text-center">
            <h5 class="text-bold">Riesgo de progresión a insuficiencia renal que requiera diálisis o transplante</h5>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-4 offset-md-2">
            <div class="info-box shadow">
              <span class="info-box-icon bg-info"><i class="fad fa-kidneys"></i></span>

              <div class="info-box-content text-center">
                <span class="info-box-number"><span id="kfre2"></span>%</span>
                <span class="info-box-text">en 2 años</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="info-box shadow">
              <span class="info-box-icon bg-info"><i class="fad fa-kidneys"></i></span>

              <div class="info-box-content text-center">
                <span class="info-box-number"><span id="kfre5"></span>%</span>
                <span class="info-box-text">en 5 años</span>
              </div>
            </div>
          </div>

          <div class="col-12 text-center">
            <small class="text-info has-tooltip text-ref" id="kfre_ref">KFRE (Kidney failure risk ecuation) [4]</small>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-8 offset-md-2">
            <ul class="mt-4">
              <li>
                <strong>KFRE mayor o igual a 3% - 5% en 5 años</strong> es necesario derivar a un nefrólogo (especialista en riñones).
              </li>
              <li>
                <strong>KFRE mayor a 10% en 2 años</strong> debe ser derivado a un equipo multidisciplinario en la Unidad de Cuidado Renal Avanzado (UCRA).
              </li>
              <li>
                <strong>Un valor de KFRE mayor a 40% en 2 años o VFGe menor de 15 mL/min</strong> determina que el paciente debe recibir educación y preparación para trasplante o diálisis.
              </li>
            </ul>
          </div>
          <div class="col-12 text-center">
            <small class="text-info has-tooltip text-ref" id="ranks_ref">Rangos de referencia nefrológica [5]</small>
          </div>
          <div class="col-10 offset-md-1 mt-3">
            <p class="text-bold">Importante</p>
            <ul>
              <li class="text-default">El KFRE es una herramienta adicional para tomar decisiones informadas sobre la
                oportunidad y el mejor tratamiento para tu enfermedad renal crónica.
              </li>
              <li class="text-default">
                <strong>Siempre</strong> comparte el resultado de esta ecuación con tu médico para planificar el
                tratamiento adecuado.
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div id="sec_res">
        <div class="row mt-5">
          <div class="col-md-8 offset-md-2">
            <div class="alert alert-warning">
              <h5><i class="icon fas fa-info"></i> Advertencia</h5>
              <span class="text"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 offset-md-3 mt-3">
          <button class="btn btn-block btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTreatments" aria-expanded="false">
            <i class="fa fa-plus mr-2"></i>Ver opciones de tratamiento
          </button>
        </div>
        <div class="col-md-10 offset-md-1 mt-4">
          <div id="collapseTreatments" class="collapse">
            <h5>Opciones de tratamiento en la Enfermedad Renal Avanzada</h5>
            <p>Cuando los riñones ya no funcionan adecuadamente, es necesario conocer todas las
              opciones de tratamiento disponibles.</p>
            <div class="card card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="treatments-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="treatments-hemo-tab" data-toggle="pill" href="#treatments-hemo" role="tab" aria-controls="treatments-hemo" aria-selected="true">Hemodiálisis</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="treatments-dialisis-tab" data-toggle="pill" href="#treatments-dialisis" role="tab" aria-controls="treatments-dialisis" aria-selected="false">Diálisis Peritoneal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="treatments-transplant-tab" data-toggle="pill" href="#treatments-transplant" role="tab" aria-controls="treatments-transplant" aria-selected="false">Trasplante Renal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="treatments-conservative-tab" data-toggle="pill" href="#treatments-conservative" role="tab" aria-controls="treatments-conservative" aria-selected="false">Tratamiento Conservador</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="treatments-tabContent">
                  <div class="tab-pane fade show active" id="treatments-hemo" role="tabpanel" aria-labelledby="treatments-hemo-tab">
                    <p class="text-center mb-4">
                      <img alt="Hemodiálisis" src="dist/img/hemodialisis.jpg" style="width:50%">
                    </p>
                    <strong>¿En qué consiste y cómo funciona?</strong><br>
                    La hemodiálisis es un tratamiento que utiliza una máquina para limpiar y filtrar la sangre cuando los riñones ya no pueden hacerlo.
                    La sangre se extrae del cuerpo a través de una aguja insertada en una vena y se pasa por un filtro especial llamado dializador o "riñón
                    artificial". Este filtro elimina las toxinas, los desechos y el exceso de líquidos. La sangre limpia se devuelve al cuerpo por otra vía.<br><br>
                    <strong>¿Dónde se realiza?</strong><br>
                    Generalmente, la hemodiálisis se realiza en centros especializados de diálisis. Los pacientes suelen asistir tres veces por semana, y
                    cada sesión dura entre 3 y 5 horas. En estos centros, un equipo de profesionales de la salud, incluyendo nefrólogos y enfermeras
                    especializadas, supervisa el tratamiento y monitorea la salud del paciente.<br><br>
                    <strong>Acceso vascular para la hemodiálisis</strong><br>
                    Para permitir el flujo constante de sangre hacia y desde la máquina de diálisis, se requiere un acceso vascular. La opción preferida es
                    una fístula arteriovenosa, creada quirúrgicamente en el brazo. Si no es posible, se puede utilizar un catéter temporal
                    insertado en una vena grande del cuello.<br><br>
                    <strong>Ventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Eliminación eficiente de toxinas y líquidos:</strong> La hemodiálisis es eficaz para limpiar la
                        sangre rápidamente.
                      </li>
                      <li class="text-default">
                        <strong>Supervisión médica constante:</strong> Los profesionales de la salud están presentes
                        durante cada sesión.
                      </li>
                      <li class="text-default">
                        <strong>No requiere equipo en casa:</strong> Todo el equipo necesario está en el centro de diálisis.
                      </li>
                      <li class="text-default">
                        <strong>Menor pérdida de proteínas:</strong> Comparado con la diálisis peritoneal, la hemodiálisis
                        pierde menos proteínas.
                      </li>
                      <li class="text-default">
                        <strong>Amplia disponibilidad:</strong> Disponible en centros de diálisis en todo país y en
                        el mundo.
                      </li>
                    </ul>
                    <strong>Desventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Desplazamientos frecuentes al centro de diálisis:</strong> Requiere viajes regulares que
                        pueden ser agotadores.
                      </li>
                      <li class="text-default">
                        <strong>Horarios rígidos:</strong> Las sesiones programadas pueden interferir con actividades
                        personales.
                      </li>
                      <li class="text-default">
                        <strong>Efectos secundarios:</strong> Posibles cambios bruscos en la presión arterial, calambres y
                        fatiga.
                      </li>
                      <li class="text-default">
                        <strong>Acceso vascular:</strong> La necesidad de una fístula o catéter implica procedimientos
                        quirúrgicos y posibles complicaciones.
                      </li>
                      <li class="text-default">
                        <strong>Variabilidad de la presión arterial:</strong> Puede provocar hipotensión (Pº baja) y
                        arritmias cardíacas durante el tratamiento.
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="treatments-dialisis" role="tabpanel" aria-labelledby="treatments-dialisis-tab">
                    <p class="text-center mb-4">
                      <img alt="Diálisis peritoneal" src="dist/img/dialisis_peri.jpg" style="width:50%">
                    </p>
                    <strong>¿En qué consiste y cómo funciona?</strong><br>
                    La diálisis peritoneal es un tratamiento que utiliza el revestimiento interno del abdomen, llamado peritoneo, como filtro natural para
                    eliminar toxinas y exceso de líquidos. Se inserta un catéter permanente en el abdomen a través del cual se introduce un líquido de
                    diálisis estéril. Las toxinas y desechos pasan desde la sangre al líquido de diálisis a través del peritoneo. Después de varias horas,
                    el líquido ahora saturado con toxinas y deshechos se drena y reemplaza por líquido de diálisis.<br><br>
                    <strong>¿Dónde se realiza?</strong><br>
                    Este tratamiento se realiza principalmente en el hogar, lo que ofrece mayor flexibilidad y
                    autonomía. Existen dos modalidades principales:
                    <ul>
                      <li class="text-default">
                        <strong>Diálisis Peritoneal Continua Ambulatoria (DPCA):</strong> El paciente realiza manualmente
                        los intercambios de líquido varias veces al día.
                      </li>
                      <li class="text-default">
                        <strong>Diálisis Peritoneal Automatizada (DPA):</strong> Una máquina llamada cicladora
                        automatiza los intercambios durante la noche mientras el paciente duerme.
                      </li>
                    </ul>
                    <strong>Requisitos para la diálisis peritoneal</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Entrenamiento:</strong> El paciente y/o su cuidador deben recibir capacitación para
                        realizar el procedimiento correctamente.
                      </li>
                      <li class="text-default">
                        <strong>Espacio adecuado en casa:</strong> Se necesita un área limpia y segura para almacenar
                        suministros y realizar los intercambios.
                      </li>
                      <li class="text-default">
                        <strong>Condiciones higiénicas:</strong> Es vital mantener una higiene estricta para prevenir
                        infecciones.
                      </li>
                    </ul>
                    <strong>Ventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Flexibilidad y autonomía:</strong> Permite adaptar el tratamiento al estilo de vida del
                        paciente.
                      </li>
                      <li class="text-default">
                        <strong>Realización en el hogar:</strong> Evita desplazamientos frecuentes a un centro de diálisis.
                      </li>
                      <li class="text-default">
                        <strong>Mejor conservación de la función renal residual:</strong> Puede preservar la función renal
                        restante por más tiempo.
                      </li>
                      <li class="text-default">
                        <strong>Menos restricciones dietéticas:</strong> Generalmente permite una dieta más flexible.
                      </li>
                      <li class="text-default">
                        <strong>Menor impacto en la presión arterial:</strong> Los cambios son más graduales, reduciendo
                        el riesgo de hipotensión.
                      </li>
                    </ul>
                    <strong>Desventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Riesgo de infecciones (peritonitis):</strong> La infección del peritoneo es una complicación
                        grave.
                      </li>
                      <li class="text-default">
                        <strong>Requiere responsabilidad y autocuidado:</strong> El paciente debe ser diligente en seguir
                        las instrucciones.
                      </li>
                      <li class="text-default">
                        <strong>Necesidad de espacio y condiciones higiénicas en casa:</strong> Puede ser un desafío para
                        algunos hogares.
                      </li>
                      <li class="text-default">
                        <strong>Mayor pérdida de proteínas:</strong> Puede llevar a problemas nutricionales si no se
                        controla adecuadamente.
                      </li>
                      <li class="text-default">
                        <strong>Capacidad limitada del peritoneo:</strong> No todos los pacientes tienen una membrana
                        peritoneal adecuada para este tratamiento.
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="treatments-transplant" role="tabpanel" aria-labelledby="treatments-transplant-tab">
                    <p class="text-center mb-4">
                      <img alt="Diálisis peritoneal" src="dist/img/transplante.jpg" style="width:50%">
                    </p>
                    <strong>¿En qué consiste y cómo funciona?</strong><br>
                    El trasplante renal es una cirugía que coloca un riñón sano de un donante en el cuerpo del paciente. El riñón trasplantado asume las
                    funciones que los riñones dañados ya no pueden realizar, como filtrar los desechos y regular el equilibrio de líquidos y electrolitos. Un
                    trasplante exitoso puede permitir al paciente llevar una vida más normal y activa.<br><br>
                    <strong>¿Dónde se realiza?</strong><br>
                    Se realiza en hospitales especializados con equipos médicos y quirúrgicos altamente capacitados. Después de la cirugía, el paciente requiere
                    hospitalización y seguimiento médico intensivo para asegurarse de que el nuevo riñón funcione correctamente y para
                    ajustar los medicamentos inmunosupresores que evitan el rechazo del nuevo órgano trasplantado.<br><br>
                    <strong>Tipos de donantes</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Donante vivo:</strong> Puede ser un familiar o alguien compatible, lo que suele ofrecer mejores resultados a largo plazo.
                      </li>
                      <li class="text-default">
                        <strong>Donante fallecido:</strong> Riñones obtenidos de personas que han fallecido y han donado sus órganos.
                      </li>
                    </ul>
                    <strong>Proceso previo al trasplante</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Evaluación exhaustiva:</strong> Para determinar si el paciente es apto para la cirugía y el tratamiento posterior.
                      </li>
                      <li class="text-default">
                        <strong>Búsqueda de donante compatible:</strong> Puede implicar tiempo en una lista de espera.
                      </li>
                      <li class="text-default">
                        <strong>Preparación psicológica y emocional:</strong> Asegurar que el paciente y su familia entiendan el proceso y los compromisos a largo plazo.
                      </li>
                    </ul>
                    <strong>Ventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Mejor calidad de vida:</strong> Mayor energía y bienestar general.
                      </li>
                      <li class="text-default">
                        <strong>Mayor esperanza de vida:</strong> Comparado con pacientes en diálisis a largo plazo.
                      </li>
                      <li class="text-default">
                        <strong>Libertad de la diálisis:</strong> Elimina la necesidad de sesiones regulares de diálisis.
                      </li>
                      <li class="text-default">
                        <strong>Menos restricciones dietéticas:</strong> Mayor flexibilidad en la alimentación.
                      </li>
                      <li class="text-default">
                        <strong>Retorno a actividades normales:</strong> Posibilidad de trabajar y realizar actividades físicas sin limitaciones significativas.
                      </li>
                    </ul>
                    <strong>Desventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Medicamentos de por vida:</strong> Necesidad de tomar inmunosupresores (anti rechazo) que pueden tener efectos secundarios.
                      </li>
                      <li class="text-default">
                        <strong>Riesgo de rechazo:</strong> El sistema inmunológico puede rechazar el nuevo órgano.
                      </li>
                      <li class="text-default">
                        <strong>Complicaciones quirúrgicas:</strong> Riesgos asociados con cualquier cirugía mayor.
                      </li>
                      <li class="text-default">
                        <strong>Tiempo de espera:</strong> Puede ser prolongado y estresante.
                      </li>
                      <li class="text-default">
                        <strong>No garantiza una solución permanente:</strong> El riñón trasplantado puede fallar eventualmente.
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="treatments-conservative" role="tabpanel" aria-labelledby="treatments-conservative-tab">
                    <p class="text-center mb-4">
                      <img alt="Diálisis peritoneal" src="dist/img/tratamiento.jpg" style="width:50%">
                    </p>
                    <strong>¿En qué consiste y cómo funciona?</strong><br>
                    El tratamiento conservador es una opción enfocada en el cuidado integral del paciente sin recurrir a diálisis o trasplante. Está especialmente
                    indicado para personas de edad avanzada o con múltiples enfermedades crónicas e invalidantes donde los tratamientos con diálisis pueden no
                    ofrecer beneficios significativos. Se centra en mejorar la calidad de vida, controlar síntomas y proporcionar apoyo emocional y social.<br><br>
                    <strong>¿Dónde se realiza?</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Lugar:</strong> Puede llevarse a cabo en el hogar, hospitales, centros médicos para adultos mayores con unidades de apoyo.
                      </li>
                      <li class="text-default">
                        <strong>Equipo multidisciplinario:</strong> Incluye nefrólogos, enfermeras, nutricionistas, psicólogos, kinesiólogos y trabajadores sociales.
                      </li>
                      <li class="text-default">
                        <strong>Componentes del tratamiento:</strong>
                        <ul>
                          <li class="text-default">Manejo de síntomas: Control de la presión arterial, anemia, edemas y
                            desequilibrios electrolíticos.
                          </li>
                          <li class="text-default">Apoyo nutricional: Dietas adaptadas para reducir la carga de desechos
                            metabólicos.
                          </li>
                          <li class="text-default">Soporte emocional y psicológico: Para el paciente y su familia.
                          </li>
                          <li class="text-default">Cuidados paliativos: Enfocados en aliviar el sufrimiento y mejorar el bienestar general.
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <strong>Candidatos para el tratamiento conservador</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Pacientes con enfermedades crónicas avanzadas:</strong> Como insuficiencia cardíaca severa o demencia avanzada.
                      </li>
                      <li class="text-default">
                        <strong>Personas que deciden no someterse a diálisis o trasplante:</strong> Por razones personales o médicas.
                      </li>
                      <li class="text-default">
                        <strong>Pacientes con contraindicación para diálisis:</strong> Debido a condiciones médicas que aumentan los riesgos.
                      </li>
                    </ul>
                    <strong>Ventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>Enfoque en la calidad de vida:</strong> Prioriza el bienestar y comodidad del paciente.
                      </li>
                      <li class="text-default">
                        <strong>Menos procedimientos invasivos:</strong> Evita las molestias y riesgos de la diálisis y cirugías.
                      </li>
                      <li class="text-default">
                        <strong>Atención personalizada:</strong> Adaptada a las necesidades y deseos del paciente.
                      </li>
                      <li class="text-default">
                        <strong>Mayor comodidad en el hogar:</strong> Reduce la necesidad de desplazamientos y hospitalizaciones.
                      </li>
                      <li class="text-default">
                        <strong>Respeto a la autonomía del paciente:</strong> Valora las decisiones personales sobre su cuidado.
                      </li>
                    </ul>
                    <strong>Desventajas</strong><br>
                    <ul>
                      <li class="text-default">
                        <strong>No reemplaza la función renal perdida:</strong> La enfermedad continúa avanzando.
                      </li>
                      <li class="text-default">
                        <strong>Expectativa de vida limitada:</strong> Puede acortar la vida en comparación con tratamientos como la diálisis.
                      </li>
                      <li class="text-default">
                        <strong>Necesidad de apoyo constante:</strong> Requiere la participación activa de familiares o cuidadores.
                      </li>
                      <li class="text-default">
                        <strong>Manejo complejo de síntomas:</strong> Puede ser difícil controlar todos los síntomas asociados.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <h5 class="mt-4">Recomendaciones en la toma de decisión entre las opciones de tratamiento en ERC Avanzada</h5>
            <p>Es esencial discutir con el equipo médico para decidir la opción más adecuada según las
              necesidades, condiciones de salud y preferencias personales. La elección del tratamiento
              debe ser una decisión compartida que considere tanto los aspectos médicos como los
              valores y deseos de la persona. Una buena comunicación y confianza entre el paciente, su
              familia y los profesionales de la salud son fundamentales para lograr el mejor resultado
              posible.</p>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-10 offset-md-1 text-center">
          ¿Quieres más información sobre tu dieta? Revisa
          <a href="https://issuu.com/crtbiobio/docs/recetario_crt" target="_blank">nuestro <i class="fa fa-salad"></i> recetario saludable aquí</a>.
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-10 offset-1">
          <h6>Referencias bibliográficas</h6>
          <a class="btn btn-light btn-biblio" id="ckd_link" href="https://pubmed.ncbi.nlm.nih.gov/19414839/" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [1] Levey AS, Stevens LA, Schmid CH, et al. "A new equation to estimate glomerular filtration rate [published correction appears in Ann Intern Med. 2011 Sep 20;155(6):408]". Ann Intern Med. 2009;150(9):604-612. doi:10.7326/0003-4819-150-9-200905050-00006.
            </span>
          </a>
          <a class="btn btn-light btn-biblio" id="mdr_link" href="https://pubmed.ncbi.nlm.nih.gov/10075613/" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [2] Levey AS, Bosch JP, Lewis JB, Greene T, Rogers N, Roth D. "A more accurate method to estimate glomerular filtration rate from serum creatinine: a new prediction equation". Modification of Diet in Renal Disease Study Group. Ann Intern Med. 1999;130(6):461-70.
            </span>
          </a>
          <a class="btn btn-light btn-biblio" id="kidney_link" href="https://kidneyfailurerisk.com/CKD_handbook__Jan_31st_2019.pdf" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [3] "Your Kidneys, Your Health: A guidebook designed for individuals diagnosed with late stage chronic kidney disease". https://kidneyfailurerisk.com
            </span>
          </a>
          <a class="btn btn-light btn-biblio" id="kfre_link" href="https://doi.org/10.1016/j.kint.2023.10.018" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [4] "Kidney Disease: Improving Global Outcomes (KDIGO) CKD Work Group (2024)". KDIGO 2024 Clinical Practice Guideline for the Evaluation and Management of Chronic Kidney Disease. Kidney international, 105(4S), S117–S314.
            </span>
          </a>
          <a class="btn btn-light btn-biblio" id="ranks_link" href="https://kidneyfailurerisk.com/interpretation" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [5] Grams ME, Brunskill NJ, Ballew SH, et al. "The kidney failure risk equation: evaluation of novel input variables including eGFR estimated using the CKD-EPI 2021 equation in 59 cohorts". J Am Soc Nephrol. 2023;34:482–494.
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'src/scripts.php' ?>
</body>
</html>
