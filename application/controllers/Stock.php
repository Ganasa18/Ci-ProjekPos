<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth/lock');
    }
    $this->load->model(['item_m', 'supplier_m', 'stock_m']);
  }

  public function stock_in_data()
  {
    $data['title'] = 'Stock In';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['stock'] = $this->stock_m->get_stock_in()->result();
    $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
  }

  public function stock_in_add()
  {


    $item = $this->item_m->get()->result();
    $supplier = $this->supplier_m->get()->result();
    $data = ['item' => $item, 'supplier' => $supplier];
    $data['title'] = 'Stock In';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
  }

  public function stock_in_del()
  {
    $stock_id = $this->uri->segment(3);
    $item_id = $this->uri->segment(4);
    $qty = $this->stock_m->get($stock_id)->row()->qty;
    $data = [
      'qty' => $qty,
      'item_id' => $item_id
    ];
    $this->item_m->update_stock_out($data);
    $this->stock_m->del($stock_id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', 'Data Stock berhasil dihapus');
    }
    redirect('stock/stock_in_data');
  }

  public function stock_out_data()
  {
    $data['title'] = 'Stock Out';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['stock'] = $this->stock_m->get_stock_out()->result();
    $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
  }

  public function stock_out_add()
  {
    $item = $this->item_m->get()->result();
    $data = ['item' => $item];
    $data['title'] = 'Stock Out';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
  }

  public function stock_out_del()
  {
    $stock_id = $this->uri->segment(3);
    $item_id = $this->uri->segment(4);
    $qty = $this->stock_m->get($stock_id)->row()->qty;
    $data = ['qty' => $qty, 'item_id' => $item_id];
    $this->item_m->update_stock_in($data);
    $this->stock_m->del($stock_id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', 'Data Stock berhasil dihapus');
    }
    redirect('stock/stock_out_data');
  }

  public function process()
  {
    if (isset($_POST['in_add'])) {
      $post = $this->input->post(null, TRUE);
      $this->stock_m->add_stock_in($post);
      $this->item_m->update_stock_in($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', 'Data Stock berhasil ditambah');
      redirect('stock/stock_in_data');
    }
    if (isset($_POST['out_add'])) {
      $post = $this->input->post(null, TRUE);
      $row_item = $this->item_m->get($this->input->post('item_id'))->row();
      if ($row_item->stock < $this->input->post('qty')) {
        $this->session->set_flashdata('error', 'Quantity melebihi atau kurang dari stock tersedia');
        redirect('stock/stock_out_add');
      } else {
        $this->stock_m->add_stock_out($post);
        $this->item_m->update_stock_out($post);
      }
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('message', 'Data Stock berhasil ditambah');
      }
      redirect('stock/stock_out_data');
    }
  }
}
