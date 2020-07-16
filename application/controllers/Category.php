<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

   public function __construct()
  {
    parent::__construct();
    $this->load->model('category_m');
    if (!$this->session->userdata('username')) {
      redirect('auth/lock');
    }
  }

   public function index()
  {
    $data['title'] = 'Category';
    $data['user'] = $this->db->get_where('users', 
    ['username' => $this->session->userdata('username')])->row_array();
    $data['category'] = $this->category_m->get();
    $this->template->load('template', 'product/category/category_data', $data);
  }

   public function add()
  {
   $category = new stdClass();
    $category->category_id = null;
    $category->name = null;
    $data = array(
      'page' => 'add',
      'row' => $category
    );
    $data['title'] = 'Category';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'product/category/category_form', $data);
  }

  public function edit($id)
  {
    $query = $this->category_m->get($id);
    if ($query->num_rows() > 0) {
      $category = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $category
      );
      $data['title'] = 'Category';
      $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
      $this->template->load('template', 'product/category/category_form', $data);
    } else {
      echo "<script>alert('Data tidak ditemukan');
			  window.location='" . site_url('category') . "';</script>";
    }
  }

  public function del($id)
  {
    $this->category_m->del($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        'message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5> Alert!</h5>
        Data berhasil dihapus
        </div>');
      redirect('category');
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      $this->category_m->add($post);
    } else if (isset($_POST['edit'])) {
      $this->category_m->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
          'message', '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5> Alert!</h5>
          Data berhasil disimpan
          </div>');
    }
    redirect('category');
  }
}