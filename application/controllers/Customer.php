<?php defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('customer_m');
    $this->load->library('form_validation');
    if (!$this->session->userdata('username')) {
      redirect('auth/lock');
    }
  }

  public function index()
  {
    $data['title'] = 'Customer';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['customer'] = $this->customer_m->get()->result_array();
    $this->template->load('template', 'customer/customer_data', $data);
  }

  public function add()
  {
    $customer = new stdClass();
    $customer->customer_id = null;
    $customer->name = null;
    $customer->gender = null;
    $customer->phone = null;
    $customer->address = null;
    $data = array(
      'page' => 'add',
      'row' => $customer
    );

    $data['title'] = 'Customer Form';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $this->template->load('template', 'customer/customer_form', $data);
  }

  public function edit($id)
  {
    $query = $this->customer_m->get($id);
    if ($query->num_rows() > 0) {
      $customer = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $customer
      );
      $data['title'] = 'Customer Form';
      $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
      $this->template->load('template', 'customer/customer_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');
			  window.location='" . site_url('customer') . "';</script>";
    }
  }


  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      $this->customer_m->add($post);
    } else if (isset($_POST['edit'])) {
      $this->customer_m->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Alert!</h5>
                                    Data berhasil disimpan
                                  </div>');
    }
    redirect('customer');
  }

  public function del($id)
  {
    $this->customer_m->del($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Alert!</h5>
                                    Data berhasil dihapus
                                  </div>');
    }
    redirect('customer');
  }
}
