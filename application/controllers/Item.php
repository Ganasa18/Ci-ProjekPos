<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth/lock');
    }
    $this->load->model(['item_m', 'category_m', 'units_m']);
  }

  public function index()
  {
    $data['title'] = 'Item';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['item'] = $this->item_m->get();
    $this->template->load('template', 'product/item/item_data', $data);
  }

  public function add()
  {
    $item = new stdClass();
    $item->item_id = null;
    $item->barcode = null;
    $item->name = null;
    $item->price = null;
    $item->category_id = null;

    $query_category = $this->category_m->get();

    $query_units = $this->units_m->get();
    $units[null] = '-Select-';
    foreach ($query_units->result() as $unt) {
      $units[$unt->units_id] = $unt->name;
    }
    $data = array(
      'page' => 'add',
      'row' => $item,
      'category' => $query_category,
      'units' => $units, 'selected_units' => null,
    );
    $data['title'] = 'Item';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'product/item/item_form', $data);
  }

  public function edit($id)
  {
    $query = $this->item_m->get($id);
    if ($query->num_rows() > 0) {
      $item = $query->row();
      $query_category = $this->category_m->get();

      $query_units = $this->units_m->get();
      $units[null] = '-Select-';
      foreach ($query_units->result() as $unt) {
        $units[$unt->units_id] = $unt->name;
      }
      $data = array(
        'page' => 'edit',
        'row' => $item,
        'category' => $query_category,
        'units' => $units, 'selected_units' => $item->units_id,
      );
      $data['title'] = 'Item';
      $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
      $this->template->load('template', 'product/item/item_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');
			  window.location='" . site_url('item') . "';</script>";
    }
  }

  public function process()
  {
    $config['upload_path']     = './uploads/product/';
    $config['allowed_types']   = 'gif|jpg|png|jpeg';
    $config['max_size']        = 2048;
    $config['file_name']       = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
    $this->load->library('upload', $config);

    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      if ($this->item_m->check_barcode($post['item_barcode'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "Barcode $post[item_barcode] sudah dipakai barang lain");
        redirect('item/add');
      } else {
        if (@$_FILES['item_image']['name'] != null) {
          if ($this->upload->do_upload('item_image')) {
            $post['item_image'] = $this->upload->data('file_name');
            $this->item_m->add($post);
            if ($this->db->affected_rows() > 0) {
              $this->session->set_flashdata('message', 'Data berhasil disimpan');
            }
            redirect('item');
          } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('item/add');
          }
        } else {
          $post['item_image'] = null;
          $this->item_m->add($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
          }
          redirect('item');
        }
      }
    } else if (isset($_POST['edit'])) {
      if ($this->item_m->check_barcode($post['item_barcode'], $post['item_id'])->num_rows() > 0) {
        $this->session->set_flashdata('error', "Barcode $post[item_barcode] sudah dipakai barang lain");
        redirect('item/edit/' . $post['item_id']);
      } else {
        if (@$_FILES['item_image']['name'] != null) {
          if ($this->upload->do_upload('item_image')) {

            $item = $this->item_m->get($post['id'])->row();
            if ($item->item_image != null) {
              $target_file = './uploads/product/' . $item->item_image;
              unlink($target_file);
            }

            $post['item_image'] = $this->upload->data('file_name');
            $this->item_m->edit($post);
            if ($this->db->affected_rows() > 0) {
              $this->session->set_flashdata('message', 'Data berhasil disimpan');
            }
            redirect('item');
          } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('item/add');
          }
        } else {
          $post['item_image'] = null;
          $this->item_m->edit($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
          }
          redirect('item');
        }
      }
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', 'Data berhasil disimpan');
      redirect('item');
    }
  }

  public function del($id)
  {
    $item = $this->item_m->get($id)->row();
    if ($item->item_image != null) {
      $target_file = './uploads/product/' . $item->item_image;
      unlink($target_file);
    }
    $this->item_m->del($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', 'Data berhasil dihapus');
      redirect('item');
    }
  }

  public function barcode_qrcode($id)
  {
    $data['row'] = $this->item_m->get($id)->row();
    $data['title'] = 'Item';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'product/item/barcode_qrcode', $data);
  }

  function barcode_print($id)
  {
    $data['row'] = $this->item_m->get($id)->row();
    $html = $this->load->view('product/item/barcode_print', $data, true);
    $this->fungsi->PdfGenerator($html, 'barcode-' . $data['row']->barcode, 'A4', 'landscape');
  }

  function qr_print($id)
  {
    $data['row'] = $this->item_m->get($id)->row();
    $html = $this->load->view('product/item/qr_print', $data, true);
    $this->fungsi->PdfGenerator($html, 'qrcode-' . $data['row']->barcode, 'A4', 'portrait');
  }
}
