<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_m');
    $this->load->library('form_validation');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'User Dashboard';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'user/dashboard', $data);
  }

  public function profile()
  {
    $data['title'] = 'My Profile';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'user/profile', $data);
  }

  public function editProf()
  {
    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $data['title'] = 'My Profile';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    if ($this->form_validation->run() ==  false) {

      $this->template->load('template', 'user/profile', $data);
    } else {
      $data = $this->user_m->userEdit();
      // jika ada gambar
      $upload_image = $_FILES['image']['name'];
      $full_path = ($_FILES["image"]["name"]);
      setcookie('image', $full_path, time() + (20 * 365 * 24 * 60 * 60), "/");

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '2048';
        $config['upload_path'] = './uploads/profile/';
        // $config['file_name']       = 'image-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $old_image = $data['user']['image'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . './uploads/profile/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $data = $this->user_m->userEdit();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
      redirect('user/profile');
    }
  }

  public function changePassword()
  {
    $this->form_validation->set_rules('currentpass', 'Current password', 'required|trim');
    $this->form_validation->set_rules('newpass', 'New password', 'required|trim|min_length[6]|matches[repeatpass]');
    $this->form_validation->set_rules('repeatpass', 'Repeat password', 'required|trim|min_length[6]|matches[newpass]');
    $data['title'] = 'Change Password';
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'user/changepass', $data);
    } else {
      $currentpass = $this->input->post('currentpass');
      $new = $this->input->post('newpass');
      if (!password_verify($currentpass, $data['user']['password'])) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert"> Password Wrong </div>');
        redirect('user/changepassword');
      } else {
        if ($currentpass == $new) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-message" role="alert"> New Password Cannot Same Current </div>');
          redirect('user/changepassword');
        } else {
          // password ok
          $password_hash = password_hash($new, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('users');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> New Password Changed </div>');
          redirect('user/changepassword');
        }
      }
    }
  }

  public function blocked()
  {
    $data['title'] = 'Blocked Access';
    $data['user'] = $this->db->get_where('users', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->template->load('template', 'blocked', $data);
  }
}
