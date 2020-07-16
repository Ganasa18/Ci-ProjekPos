<?php defined('BASEPATH') or exit('No direct script access allowed');

class Grafik_m extends CI_Model
{
  function get_data_stok()
  {
    $query = $this->db->query("SELECT name ,SUM(stock) AS stock FROM p_item GROUP BY name");
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $data) {
        $hasil[] = $data;
      }
      return $hasil;
    }
  }
}
