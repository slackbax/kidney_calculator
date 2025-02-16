<?php

class Country
{
  public function select(): array
  {
    $con = new Connect();
    $query = "SELECT cou_id, cou_name, cou_demonym, cou_ison, cou_iso2, cou_iso3 FROM country";
    $stmt = $con->Prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $array = [];
    while ($data = $result->fetch_assoc()) {
      $obj = new stdClass();
      $obj->id = $data['cou_id'];
      $obj->text = $data['cou_name'];
      $array[] = $obj;
    }
    return $array;
  }
}