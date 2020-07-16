<?php defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('supplier_m');
    if (!$this->session->userdata('username')) {
      redirect('auth/lock');
    }
  }

  public function index()
  {
    $data['title'] = 'Supplier';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['supplier'] = $this->supplier_m->get();
    $this->template->load('template', 'supplier/supplier_data', $data);
  }

  public function add()
  {
    $supplier = new stdClass();
    $supplier->supplier_id = null;
    $supplier->name = null;
    $supplier->phone = null;
    $supplier->alamat = null;
    $supplier->deskripsi = null;
    $data = array(
      'page' => 'add',
      'row' => $supplier
    );
    $data['title'] = 'Supplier';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'supplier/supplier_form', $data);
  }

  public function edit($id)
  {
    $query = $this->supplier_m->get($id);
    if ($query->num_rows() > 0) {
      $supplier = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $supplier
      );
      $data['title'] = 'Supplier';
      $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
      $this->template->load('template', 'supplier/supplier_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');
			  window.location='" . site_url('supplier') . "';</script>";
    }
  }

  public function del($id)
  {
    $this->supplier_m->del($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5> Alert!</h5>
          Data berhasil disimpan
          </div>'
      );
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5> Alert!</h5>
        Data berhasil dihapus
        </div>'
      );
    }
    redirect('supplier');
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      $this->supplier_m->add($post);
    } else if (isset($_POST['edit'])) {
      $this->supplier_m->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Alert!</h5>
                                    Data berhasil disimpan
                                  </div>');
    }
    redirect('supplier');
  }
}
