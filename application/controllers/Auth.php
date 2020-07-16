<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('cookie');
    $this->load->model('user_m');
  }

  public function index()
  {
    if ($this->session->userdata('username')) {
      redirect('user/profile');
    }
    $this->form_validation->set_rules('username', 'Username', 'trim|required', [
      'required' => 'Please fill username'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Admin My-POS | Login Page';
      $this->load->view('login', $data);
    } else {
      // Validasi sukses
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('users', ['username' => $username])->row_array();
    if ($user != null) {
      // jika user ada
      $_COOKIE['username'] = $username;
      setcookie('username', $username, time() + (86400 * 3), "/");
      // jika user aktive
      if ($user['is_active'] == 1) {
        //  cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id'],
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            echo "<script>
			      alert('Login Berhasil');
			      window.location='" . site_url('admin') . "';
			      </script>";
          } else {
            echo "<script>
			      alert('Login Berhasil');
			      window.location='" . site_url('user') . "';
			      </script>";
          }
        } else {
          $this->session->set_flashdata('confirm', '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Alert!</h5>
                                    Wrong password!!
                                  </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('confirm', '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Alert!</h5>
                                    User has not activated
                                  </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('confirm', '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Alert!</h5>
                                    Username is not registered
                                  </div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    if ($this->session->userdata('username')) {
      redirect('user/profile');
    }

    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
      'is_unique' => 'Username has taken'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
      'valid_email' => 'Please use valid email!!',
      'is_unique' => 'Email has registered'
    ]);
    $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'password dont match!!',
      'min_length' => 'Password too short!!'
    ]);
    $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {

      $data['title'] = 'Admin My-POS | Registration Page';
      $this->load->view('registration', $data);
    } else {
      $this->user_m->registMember();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    Your account has been created. Please login
                                  </div>');
      redirect('auth');
    }
  }

  public function lock()
  {

    $data['title'] = 'Admin My-POS | Lockscreen';
    $this->load->view('lockscreen', $data);
    if (!get_cookie('username')) {
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    set_cookie('username', '', time() - 3600);
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('confirm', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5> Alert!</h5>
                                    You have been logout
                                  </div>');
    redirect('auth');
  }
}
