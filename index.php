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
          <h3>Calculadora de Función Renal</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="wrapper">
    <div class="row">
      <div class="alert mt-4">
        <h5 class="font-weight-bold mb-3">¿Qué necesitas para calcular tu función renal?</h5>
        <p>
          El análisis de creatinina es una forma de medir el funcionamiento de los riñones al momento de filtrar los
          desechos de la sangre.
        </p>
        <p>
          La medición de creatinina es parte de las mediciones de un perfil bioquímico donde, mediante una muestra
          sanguínea, se miden diversos parámetros. Esto se puede solicitar por orden del médico tratante,
          voluntariamente en un chequeo general, o por un control crónico.
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
                <label for="creat_album"><i class="fad fa-glass-whiskey-rocks mr-2"></i><span class="has-tooltip" data-toggle="tooltip" data-placement="right" data-html="true" title="Medida en mg/g">Ratio Albúmina/Creatinina en Orina</span></label>
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
          <button class="btn btn-block btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseRecommendations" aria-expanded="false"><i class="fa fa-plus mr-2"></i>Ver recomendaciones</button>
        </div>
        <div class="col-md-10 offset-md-1 mt-3">
          <div id="collapseRecommendations" class="collapse">
            <div class="card card-body"></div>
          </div>
        </div>
      </div>

      <div id="main_res">
        <div class="row mt-5">
          <div class="col-12 text-center">
            <h5>Riesgo de progresión a insuficiencia renal que requiera diálisis o transplante:</h5>
          </div>
        </div>

        <div class="row mt-3">
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
              <li><strong>Un riesgo en 5 años entre 3 y 5 %</strong> sugiere una derivación a un médico nefrólogo.</li>
              <li>
                <strong>Un riesgo de insuficiencia renal en 2 años mayor al 10 %</strong> sugiere que es momento de recibir una atención de salud interdisciplinaria (médico nefrólogo, enfermera/o, nutricionista, entre otros).
              </li>
              <li>
                <strong>Un riesgo estimado en 2 años con valores entre 20 y 40 %</strong> puede determinar que es tiempo de prepararse para un posible trasplante renal.
              </li>
            </ul>
          </div>
          <div class="col-12 text-center">
            <small class="text-info has-tooltip text-ref" id="ranks_ref">Rangos de referencia nefrológica [5]</small>
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
          <a class="btn btn-light btn-biblio" href="https://kidneyfailurerisk.com/CKD_handbook__Jan_31st_2019.pdf" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [3] "Your Kidneys, Your Health: A guidebook designed for individuals diagnosed with late stage chronic kidney disease". https://kidneyfailurerisk.com
            </span>
          </a>
          <a class="btn btn-light btn-biblio" id="kfre_link" href="https://jamanetwork.com/journals/jama/article-abstract/2481005" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [4] Tangri N, Grams ME, Levey AS, et al. "Multinational Assessment of Accuracy of Equations for Predicting Risk of Kidney Failure: A Meta-analysis". JAMA. 2016;315(2):164–174. doi:10.1001/jama.2015.18202
            </span>
          </a>
          <a class="btn btn-light btn-biblio" id="ranks_link" href="https://kidneyfailurerisk.com/interpretation" target="_blank">
            <span class="btn-icon">
              <i class="fad fa-books"></i>
            </span>
            <span class="btn-text">
              [5] https://kidneyfailurerisk.com/interpretation
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
