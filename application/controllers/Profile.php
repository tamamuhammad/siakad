<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $roleId = $data['user']['role'];
        $data['role'] = $this->db->get_where('user_role', ['id' => $roleId])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'No Telepon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $data = $this->upload->data();
                    $oldgambar = $data['admin']['gambar'];
                    if ($oldgambar != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $oldgambar);
                    }
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/' . $data['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = '480';
                    $config['height'] = '480';
                    // $config['x_axis'] = '0';
                    // $config['y_axis'] = '0';
                    $config['new_image'] = './assets/img/' . $data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $newgambar = $data['file_name'];
                    $this->db->set('gambar', $newgambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'nama' => $this->input->post('name'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
            ];

            $this->db->set($data);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Diubah');
            redirect('profile/changepassword');
        }
    }

    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change Password';
        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[6]|matches[repeatPassword]');
        $this->form_validation->set_rules('repeatPassword', 'Repeat Password', 'required|trim|min_length[6]|matches[newPassword]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('profile/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword');
            if (password_verify($currentPassword, $data['user']['password'])) {
                if ($newPassword == $currentPassword) {
                    $this->session->set_flashdata('danger', '<div class="alert alert-danger">Password baru tidak boleh sama dengan Password lama</div>');
                    redirect('profile/changepassword');
                } else {
                    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $newPassword);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', 'Diubah');
                    redirect('profile/changepassword');
                }
            } else {
                $this->session->set_flashdata('danger', '<div class="alert alert-danger">Password lama salah!</div>');
                redirect('profile/changepassword');
            }
        }
    }
}
