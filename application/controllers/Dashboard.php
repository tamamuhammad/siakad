<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->model('Tablemodel');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'SIAKAD SMKSA';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function dokumen()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['role'] = $this->db->get_where('doc_access', ['user' => $data['user']['role']])->result_array();
        $data['dokumen'] = $this->db->get('dokumen')->result_array();

        $data['title'] = 'Daftar Dokumen';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/dokumen', $data);
        $this->load->view('templates/footer');
    }


    public function tambah()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($data['user']['role'] > 2) {
            redirect('auth/blocked');
        }
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['title'] = 'Tambah Dokumen';
        $this->form_validation->set_rules('nama', 'Nama Dokumen', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Dokumen', 'required');
        $this->form_validation->set_rules('pembuat', 'Pembuat Dokumen', 'required');
        $this->form_validation->set_rules('link', 'Link Berkas', 'required|min_length[18]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'pembuat' => $this->input->post('pembuat'),
                'link' => $this->input->post('link')
            ];
            $this->db->insert('dokumen', $data);

            $id_dok = $this->db->get_where('dokumen', ['link' => $this->input->post('link')])->row_array();
            $id_dok = $id_dok['id'];

            $data2 = [
                'dokumen' => $id_dok,
                'user' => 1
            ];
            $this->db->insert('doc_access', $data2);

            for ($i = 2; $i < 5; $i++) {
                if ($this->input->post('akses' . $i)) {
                    $data2 = [
                        'dokumen' => $id_dok,
                        'user' => $this->input->post('akses' . $i)
                    ];

                    $this->db->insert('doc_access', $data2);
                }
            }

            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('dashboard/dokumen');
        }
    }

    public function detail($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['dokumen'] = $this->db->get_where('dokumen', ['id' => $id])->row_array();
        $data['title'] = 'Preview ' . $data['dokumen']['nama'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($data['user']['role'] > 2) {
            redirect('auth/blocked');
        }
        $data['dokumen'] = $this->db->get_where('dokumen', ['id' => $id])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['title'] = 'Edit ' . $data['dokumen']['nama'];
        $this->form_validation->set_rules('nama', 'Nama Dokumen', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Dokumen', 'required');
        $this->form_validation->set_rules('pembuat', 'Pembuat Dokumen', 'required');
        $this->form_validation->set_rules('link', 'Link Berkas', 'required|min_length[18]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'pembuat' => $this->input->post('pembuat'),
                'link' => $this->input->post('link')
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('dokumen');

            for ($i = 2; $i < 5; $i++) {
                if ($this->input->post('akses' . $i)) {
                    $akses = $this->db->get_where('doc_access', ['user' => $i, 'dokumen' => $id])->result_array();
                    if (!$akses) {
                        $data2 = [
                            'dokumen' => $id,
                            'user' => $i
                        ];

                        $this->db->insert('doc_access', $data2);
                    }
                } else {
                    $akses = $this->db->get_where('doc_access', ['user' => $i, 'dokumen' => $id])->result_array();
                    if ($akses) {
                        $this->db->where('user', $i);
                        $this->db->where('dokumen', $id);
                        $this->db->delete('doc_access');
                    }
                }
            }

            $this->session->set_flashdata('message', 'Diedit');
            redirect('dashboard/dokumen');
        }
    }

    public function hapus($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($data['user']['role'] > 2) {
            redirect('auth/blocked');
        }
        $this->db->where('dokumen', $id);
        $this->db->delete('doc_access');
        $this->db->where('id', $id);
        $this->db->delete('dokumen');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/dokumen');
    }
}
