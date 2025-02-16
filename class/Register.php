<?php

class Register
{
  /**
   * @param $id
   * @param $db
   * @return stdClass
   */
  public function get($id, $db = null): stdClass
  {
    if (is_null($db)) $db = new Connect();
    $stmt = $db->Prepare("SELECT * FROM register WHERE reg_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $db->setToObject($row);
  }

  /**
   * @param $db
   * @return array
   */
  public function getAll($db = null): array
  {
    if (is_null($db)) $db = new Connect();
    $stmt = $db->Prepare("SELECT r.reg_id FROM register r
                                    JOIN country c ON r.reg_country = c.cou_id
                                    JOIN region re ON r.reg_region = re.reg_id
                                    ORDER BY r.reg_id DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $lista = [];
    while ($row = $result->fetch_assoc()) {
      $lista[] = $this->get($row['con_id']);
    }
    unset($db);
    return $lista;
  }

  public function set($country, $region, $age, $sex, $afro, $hiper, $diabetes, $creat, $ratio, $etapa, $ckd, $mdr, $tyr, $fyr, $db = null): array
  {
    if (is_null($db)) $db = new Connect();
    try {
      $stmt = $db->Prepare("INSERT INTO register (reg_country, reg_region, reg_age, reg_sex, reg_afro, reg_hiper, reg_diabetes, reg_creat, reg_ratio, reg_etapa, reg_ckd, reg_mdr, reg_tyr, reg_fyr) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      if (!$stmt) throw new Exception("La inserción de la consulta falló en su preparación.");
      $result = $db->prepareToBD(func_get_args());
      $bind = $stmt->bind_param($result['typeStr'], ...$result['params']);
      if (!$bind) throw new Exception("La inserción de la consulta falló en su binding.");
      if (!$stmt->execute()) throw new Exception("La inserción de la consulta falló en su ejecución.");
      $result = array('status' => true, 'conid' => $stmt->insert_id);
      $stmt->close();
      return $result;
    } catch (Exception $e) {
      return array('status' => false, 'msg' => $e->getMessage());
    }
  }
}
