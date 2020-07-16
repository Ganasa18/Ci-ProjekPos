<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
  public function registMember()
  {
    $data = [
      "fullname" => htmlspecialchars($this->input->post('fullname', true)),
      "username" => htmlspecialchars($this->input->post('username', true)),
      "email" => htmlspecialchars($this->input->post('email', true)),
      "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      "image" => 'default.jpg',
      "address" => null,
      "role_id" => 2,
      "is_active" => 1,
      'date_created' => time()
    ];
    $this->db->insert('users', $data);
  }

  public function userEdit()
  {
    $data = [
      "fullname" => $this->input->post('fullname', true),
      "email" => $this->input->post('email', true),
      "address" => $this->input->post('address', true),
      "updated" => date('Y-m-d H:i:s')
    ];
    $this->db->where('user_id', $this->input->post('id'));
    $this->db->update('users', $data);
  }

  public function get($id = null)
  {
    $this->db->from('users');
    if ($id != null) {
      $this->db->where('user_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }
}
