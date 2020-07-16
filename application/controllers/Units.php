<?php defined('BASEPATH') or exit('No direct script access allowed');

class Units extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('units_m');
    if (!$this->session->userdata('username')) {
      redirect('auth/lock');
    }
  }

  public function index()
  {
    $data['title'] = 'Units';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['units'] = $this->units_m->get();
    $this->template->load('template', 'product/units/units_data', $data);
  }

  public function add()
  {
    $units = new stdClass();
    $units->units_id = null;
    $units->name = null;
    $data = array(
      'page' => 'add',
      'row' => $units
    );
    $data['title'] = 'Units';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'product/units/units_form', $data);
  }

  public function del($id)
  {
    $this->units_m->del($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5> Alert!</h5>
        Data berhasil dihapus
        </div>'
      );
      redirect('units');
    }
  }

  public function edit($id)
  {
    $query = $this->units_m->get($id);
    if ($query->num_rows() > 0) {
      $units = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $units
      );
      $data['title'] = 'Units';
      $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
      $this->template->load('template', 'product/units/units_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');
			  window.location='" . site_url('units') . "';</script>";
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      $this->units_m->add($post);
    } else if (isset($_POST['edit'])) {
      $this->units_m->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5> Alert!</h5>
          Data berhasil disimpan
          </div>'
      );
    }
    redirect('units');
  }
}
