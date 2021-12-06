<?php

function is_logged()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access', ['role_id' => $role_id, 'menu_id' => $menu_id])->num_rows();

        if ($userAccess < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $result = $ci->db->get_where('user_access', ['role_id' => $role_id, 'menu_id' => $menu_id])->num_rows();

    if ($result > 0) {
        return 'checked';
    }
}

function checkAccess($role, $dokumen)
{
    $ci = get_instance();

    $result = $ci->db->get_where('doc_access', ['user' => $role, 'dokumen' => $dokumen])->num_rows();

    if ($result > 0) {
        return 'checked';
    }
}
