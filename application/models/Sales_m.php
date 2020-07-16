<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales_m extends CI_Model
{
  public function invoice_no()
  {
    $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
            FROM t_sales 
            WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $n = ((int) $row->invoice_no) + 1;
      $no = sprintf("%'.04d", $n);
    } else {
      $no = "0001";
    }
    $invoice = "P" . date('ymd') . $no;
    return $invoice;
  }

  public function add_cart($post)
  {
    $this->db->select_max('cart_id');
    $query = $this->db->get('t_cart');
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $car_no = ((int) $row->cart_id) + 1;
    } else {
      $car_no = "1";
    }
    $params = [
      'cart_id' => $car_no,
      'item_id' => $post['item_id'],
      'price' => $post['price'],
      'qty' => $post['qty'],
      'total' => $post['price'] * $post['qty'],
    ];
    $this->db->insert('t_cart', $params);
  }

  public function get_cart($params = null)
  {
    $this->db->select('t_cart.*,p_item.*, p_item.name as item_name, t_cart.price as cart_price');
    $this->db->from('t_cart');
    $this->db->join('p_item', 'p_item.item_id = t_cart.item_id');
    if ($params != null) {
      $this->db->where('cart_id', $params);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del_cart($params = null)
  {
    if ($params != null) {

      $this->db->where($params);
    }
    $this->db->delete('t_cart');
  }

  public function edit_cart($post)
  {
    $params = [
      'price' => $post['price'],
      'qty' => $post['qty'],
      'discount_item' => $post['discount'],
      'total' => $post['total'],
    ];
    $this->db->where('cart_id', $post['cart_id']);
    $this->db->update('t_cart', $params);
  }

  public function add_sales($post)
  {
    $params = [
      'invoice' => $this->invoice_no(),
      'customer_id' => $post['customer_id'] == "" ? null : $post['customer_id'],
      'total_price' => $post['subtotal'],
      'discount' => $post['discount'],
      'final_price' => $post['grandtotal'],
      'cash' => $post['cash'],
      'change' => $post['change'],
      'date' => $post['date'],
    ];
    $this->db->insert('t_sales', $params);
    return $this->db->insert_id();
  }

  function add_sales_detail($params)
  {
    $this->db->insert_batch('t_sales_detail', $params);
  }

  public function get_sales($id = null)
  {
    $this->db->select('*, customer.name as customer_name , 
                      t_sales.created as sales_created');
    $this->db->from('t_sales');
    $this->db->join('customer', 't_sales.customer_id = customer.customer_id', 'left');
    if ($id != null) {
      $this->db->where('sales_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function get_sales_detail($sales_id = null)
  {
    $this->db->from('t_sales_detail');
    $this->db->join('p_item', 'p_item.item_id = t_sales_detail.item_id');
    if ($sales_id != null) {
      $this->db->where('t_sales_detail.sales_id', $sales_id);
    }
    $query = $this->db->get();
    return $query;
  }
}
