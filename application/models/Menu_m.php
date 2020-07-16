<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_m extends CI_Model
{

  public function get($id = null)
  {
    $this->db->from('user_menu');
    if ($id != null) {
      $this->db->where('id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getSubMenu($id = null)
  {
    $query = " SELECT `user_sub_menu`.*, `user_menu`.`menu`
               FROM `user_sub_menu` JOIN `user_menu`
               ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            ";
    if ($id != null) {
      $this->db->where('id', $id);
    }
    return $this->db->query($query)->result_array();
  }

  public function getSubMenuById($id)
  {
    return  $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
  }

  public function add($post)
  {
    $params = [
      'menu' => $post['menu']
    ];
    $this->db->insert('user_menu', $params);
  }

  public function edit($post)
  {
    $params = [
      'menu' => $post['menu']
    ];
    $this->db->where('id', $post['id']);
    $this->db->update('user_menu', $params);
  }

  public function addSubMenu()
  {
    $params = [
      'menu_id' => $this->input->post('menu_id', true),
      'title' => $this->input->post('title', true),
      'url' => $this->input->post('url', true),
      'icon' => $this->input->post('icon', true),
      'is_active' => $this->input->post('is_active'),
    ];
    $this->db->insert('user_sub_menu', $params);
  }

  public function editSubMenu()
  {
    $data = [
      "menu_id" => $this->input->post('menu_id', true),
      "title" => $this->input->post('title', true),
      "url" => $this->input->post('url', true),
      "icon" => $this->input->post('icon', true),
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_sub_menu', $data);
  }


  public function delMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_menu');
  }

  public function delSubMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');
  }
}
