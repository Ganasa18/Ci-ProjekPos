<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('menu_m');
    is_logged_in();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $data['title'] = 'Menu Management';
    $data['menu'] = $this->menu_m->get();
    $this->template->load('template', 'menu/index', $data);
  }

  public function add()
  {
    $menu = new stdClass();
    $menu->id = null;
    $menu->menu = null;
    $data = array(
      'page' => 'add',
      'row' => $menu
    );
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $data['title'] = 'Menu Management';
    $this->template->load('template', 'menu/menu_form', $data);
  }

  public function edit($id)
  {
    $query = $this->menu_m->get($id);
    if ($query->num_rows() > 0) {
      $menu = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $menu
      );
      $data['user'] = $this->db->get_where('users', ['username' =>
      $this->session->userdata('username')])->row_array();
      $data['title'] = 'Menu Management';
      $this->template->load('template', 'menu/menu_form', $data);
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Data tidak ditemukan
                  </div>'
      );
      redirect('menu');
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      $this->menu_m->add($post);
    } else if (isset($_POST['edit'])) {
      $this->menu_m->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Data berhasil disimpan
                  </div>'
      );
      redirect('menu');
    }
  }

  public function delMenu($id)
  {
    $this->menu_m->delMenu($id);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Menu berhasil di hapus
                  </div>'
    );
    redirect('menu');
  }

  // SUB MENU

  public function submenu()
  {
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $data['title'] = 'Submenu Management';
    $data['submenu'] = $this->menu_m->getSubMenu();
    $this->template->load('template', 'submenu/submenu', $data);
  }

  public function addSubMenu()
  {
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $data['title'] = 'Submenu Management';
    $data['submenu'] = $this->menu_m->getSubMenu();
    $data['menu'] = $this->menu_m->get()->result_array();

    if ($this->form_validation->run() == False) {

      $this->template->load('template', 'submenu/add_submenu', $data);
    } else {
      $this->menu_m->addSubMenu();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Data berhasil disimpan
                  </div>'
      );
      redirect('menu/submenu');
    }
  }


  public function editSubMenu($submenu_id)
  {
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $data['title'] = 'Submenu Management';
    $data['submenu'] = $this->menu_m->getSubMenuById($submenu_id);

    if ($this->form_validation->run() == False) {

      $this->template->load('template', 'submenu/edit_submenu', $data);
    } else {
      $this->menu_m->editSubMenu();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Data berhasil disimpan
                  </div>'
      );
      redirect('menu/submenu');
    }
  }

  public function delSubMenu($id)
  {
    $this->menu_m->delSubMenu($id);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Submenu berhasil di hapus
                  </div>'
    );
    redirect('menu/submenu');
  }
}
