<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth/lock');
    }
    $this->load->model(['customer_m', 'item_m', 'sales_m']);
    $this->load->library('form_validation');
  }

  public function index()
  {
    $customer = $this->customer_m->get()->result();
    $item = $this->item_m->get()->result();
    $cart = $this->sales_m->get_cart();
    $data = array(
      'item' => $item,
      'customer' => $customer,
      'cart' => $cart,
      'invoice' => $this->sales_m->invoice_no(),
    );
    $data['title'] = 'Sales';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'transaction/sales/sales_form', $data);
  }

  function cart_data()
  {
    $cart = $this->sales_m->get_cart();
    $data['cart'] = $cart;
    $this->load->view('transaction/sales/cart_data', $data);
  }

  public function process()
  {
    $data = $this->input->post(null, TRUE);

    if (isset($_POST['add_cart'])) {
      $this->sales_m->add_cart($data);
      if ($this->db->affected_rows() > 0) {
        $params = ["success" => true];
      } else {
        $params = ["success" => false];
      }
      echo json_encode($params);
    }
    if (isset($_POST['edit_cart'])) {
      $this->sales_m->edit_cart($data);
      if ($this->db->affected_rows() > 0) {
        $params = ["success" => true];
      } else {
        $params = ["success" => false];
      }
      echo json_encode($params);
    }

    if (isset($_POST['process_payment'])) {
      $sale_id = $this->sales_m->add_sales($data);
      $cart = $this->sales_m->get_cart()->result();
      $row = [];
      foreach ($cart as $c => $value) {
        array_push(
          $row,
          array(
            'sales_id' => $sale_id,
            'item_id' => $value->item_id,
            'price' =>  $value->price,
            'qty' =>  $value->qty,
            'discount_item' =>  $value->discount_item,
            'total' =>  $value->total,
          )
        );
      }
      $this->sales_m->add_sales_detail($row);
      $this->db->empty_table('t_cart');
      if ($this->db->affected_rows() > 0) {
        $params = ["success" => true, "sales_id" => $sale_id];
      } else {
        $params = ["success" => false];
      }
      echo json_encode($params);
    }
  }

  public function cart_del()
  {
    // Menhapus cart dari id cart
    $cart_id = $this->input->post('cart_id');
    $this->sales_m->del_cart(['cart_id' => $cart_id]);

    if ($this->db->affected_rows() > 0) {
      $params = ["success" => true];
    } else {
      $params = ["success" => false];
    }
    echo json_encode($params);
  }

  public function reset()
  {
    $this->db->empty_table('t_cart');

    if ($this->db->affected_rows() > 0) {
      $params = ["success" => true];
    } else {
      $params = ["success" => false];
    }
    echo json_encode($params);
    redirect('sales');
  }

  public function cetak($id)
  {
    $data = [
      'sales' => $this->sales_m->get_sales($id)->row(),
      'sales_detail' => $this->sales_m->get_sales_detail($id)->result(),
    ];
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('transaction/sales/receipt_print', $data);
  }
}
