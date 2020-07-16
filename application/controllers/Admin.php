<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['admin_m', 'menu_m']);
    $this->load->library('form_validation');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->load->model('grafik_m');
    $data['data'] = $this->grafik_m->get_data_stok();
    $this->template->load('template', 'admin/dashboard', $data);
  }


  public function role()
  {
    $data['title'] = 'Role';
    $data['role'] = $this->admin_m->getRole();
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->form_validation->set_rules('role', 'Role', 'required|is_unique[user_role.role]', [
      'is_unique' => 'Name has registered'
    ]);

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'admin/role', $data);
    } else {
      $this->admin_m->addRole();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Success!</h5>
                                    Success Added New Role!
                                     </div>');
      redirect('admin/role');
    }
  }

  public function roleAccess($id)
  {
    $data['title'] = 'Role Access';
    $data['role'] = $this->admin_m->getRoleById($id);
    $this->db->where('id !=', 1);
    $data['menu'] = $this->menu_m->get()->result_array();
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'admin/role_access', $data);
  }


  public function changeAccess()
  {

    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id

    ];

    $result = $this->db->get_where('user_access_menu', $data);
    if ($result->num_rows() < 1) {

      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Success!</h5>
                                    Access Change!
                                     </div>');
  }

  public function editRole($role_id)
  {
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Edit Role';
    $data['role'] = $this->admin_m->getRoleById($role_id);
    $this->form_validation->set_rules('role', 'Role', 'required');
    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'admin/edit_role', $data);
    } else {
      $this->admin_m->updateRole();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Success!</h5>
                                    Success Edit Role!
                                     </div>');
      redirect('admin/role');
    }
  }

  public function delRole($id)
  {
    $this->admin_m->deleteRole($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Success!</h5>
                                    Role has been deleted
                                     </div>');
    redirect('admin/role');
  }
}
