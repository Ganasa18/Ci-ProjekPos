<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{
  public function getRole($id = null)
  {
    $this->db->from('user_role');
    if ($id != null) {
      $this->db->where('id', $id);
    }
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function getRoleById($id)
  {
    return  $this->db->get_where('user_role', ['id' => $id])->row_array();
  }

  public function addRole()
  {
    $data = [
      'role' => $this->input->post('role')
    ];
    $this->db->insert('user_role', $data);
  }

  public function updateRole()
  {

    $data = [
      "role" => $this->input->post('role', true)
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_role', $data);
  }

  public function deleteRole($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_role');
  }
}
