<?php

class Region
{
  /**
   * Select all regions
   * @return array
   */
  public function select(): array
  {
    $con = new Connect();
    $query = "SELECT reg_id, reg_name, reg_number FROM region";
    $stmt = $con->Prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $array = [];
    while ($data = $result->fetch_assoc()) {
      $obj = new stdClass();
      $obj->id = $data['reg_id'];
      $obj->text = $data['reg_number'] . ' ' . $data['reg_name'];
      $array[] = $obj;
    }
    return $array;
  }
}
