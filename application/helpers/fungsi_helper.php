<?php

function is_logged_in()
{

  $ci = get_instance();
  if (!$ci->session->userdata('username')) {
    redirect('auth/lock');
  } else {
    $role_id = $ci->session->userdata('role_id');
    $menu = $ci->uri->segment(1);

    $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    $menu_id = $queryMenu['id'];


    $userAccess = $ci->db->get_where('user_access_menu', [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ]);

    if ($userAccess->num_rows() < 1) {
      redirect('user/blocked');
    }
  }
}

function indo_currency($nominal)
{
  $result = "Rp " . number_format($nominal, 0, ",", ".");
  return $result;
}

function indo_date($date)
{
  $d = substr($date, 8, 2);
  $m = substr($date, 5, 2);
  $y = substr($date, 0, 4);
  return $d . '-' . $m . '-' . $y;
}


function check_access($role_id, $menu_id)
{

  $ci = get_instance();

  $ci->db->where('role_id', $role_id);
  $ci->db->where('menu_id', $menu_id);
  $result = $ci->db->get('user_access_menu');


  if ($result->num_rows() > 0) {
    return "checked=checked";
  }
}
