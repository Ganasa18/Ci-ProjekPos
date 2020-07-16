<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_m extends CI_Model
{

  public function get($id = null)
  {
    $this->db->select('p_item.*, p_category.name as category_name, p_units.name as units_name');
    $this->db->from('p_item');
    $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
    $this->db->join('p_units', 'p_units.units_id = p_item.units_id');
    if ($id != null) {
      $this->db->where('item_id', $id);
    }
    $this->db->order_by('barcode', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
  {
    $this->db->where('item_id', $id);
    $this->db->delete('p_item');
  }

  public function add($post)
  {
    $params = [
      'barcode' => $post['item_barcode'],
      'name' => $post['item_name'],
      'category_id' => $post['category'],
      'units_id' => $post['units'],
      'price' => $post['item_price'],
      'item_image' => $post['item_image'],
    ];
    $this->db->insert('p_item', $params);
  }

  function check_barcode($code, $id = null)
  {
    $this->db->from('p_item');
    $this->db->where('barcode', $code);
    if ($id != null) {
      $this->db->where('item_id != ', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function edit($post)
  {
    $params = [
      'barcode' => $post['item_barcode'],
      'name' => $post['item_name'],
      'category_id' => $post['category'],
      'units_id' => $post['units'],
      'price' => $post['item_price'],
      'updated' => date('Y-m-d H:i:s')
    ];
    if ($post['item_image'] != null) {
      $params['item_image'] = $post['item_image'];
    }
    $this->db->where('item_id', $post['item_id']);
    $this->db->update('p_item', $params);
  }


  public function update_stock_in($data)
  {
    $qty = $data['qty'];
    $id = $data['item_id'];
    $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
    $this->db->query($sql);
  }
  public function update_stock_out($data)
  {
    $qty = $data['qty'];
    $id = $data['item_id'];
    $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
    $this->db->query($sql);
  }
}
