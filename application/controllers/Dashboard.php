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
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['alumni'] = $this->db->count_all_results('alumni');
        $this->db->where('keg_set_lulus', 'Bekerja');
        $this->db->from('alumni');
        $data['bekerja'] = $this->db->count_all_results();
        $this->db->like('keg_set_lulus', 'Kuliah');
        $this->db->from('alumni');
        $data['kuliah'] = $this->db->count_all_results();
        $this->db->like('keg_set_lulus', 'Wirausaha');
        $this->db->from('alumni');
        $data['wirausaha'] = $this->db->count_all_results();
        $this->db->where('keg_set_lulus', 'Belum Kerja');
        $this->db->from('alumni');
        $data['xbekerja'] = $this->db->count_all_results();
        $this->db->like('jurusan', 'Teknik Komputer dan Jaringan');
        $this->db->from('alumni');
        $data['tkj'] = $this->db->count_all_results();
        $this->db->like('jurusan', 'Rekayasa Perangkat Lunak');
        $this->db->from('alumni');
        $data['rpl'] = $this->db->count_all_results();
        $this->db->like('jurusan', 'Tata Busana');
        $this->db->from('alumni');
        $data['tb'] = $this->db->count_all_results();
        $this->db->like('jurusan', 'Teknik Kendaraan Ringan Otomotif');
        $this->db->from('alumni');
        $data['tkro'] = $this->db->count_all_results();
        $this->db->like('jurusan', 'Teknik Bisnis Sepeda Motor');
        $this->db->from('alumni');
        $data['tbsm'] = $this->db->count_all_results();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function table()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['keyword2'] = 0;
        if ($this->input->post('bekerja')) {
            $data['keyword'] = 'Bekerja';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('kuliah')) {
            $data['keyword'] = 'Kuliah';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('wirausaha')) {
            $data['keyword'] = 'Wirausaha';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('xbekerja')) {
            $data['keyword'] = 'Belum Kerja';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('tkj')) {
            $data['keyword'] = 'Teknik Komputer dan Jaringan';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('rpl')) {
            $data['keyword'] = 'Rekayasa Perangkat Lunak';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('tb')) {
            $data['keyword'] = 'Tata Busana';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('tkro')) {
            $data['keyword'] = 'Teknik Kendaraan Ringan Otomotif';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('tbsm')) {
            $data['keyword'] = 'Teknik Bisnis Sepeda Motor';
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else if ($this->input->post('nonaktif')) {
            $data['keyword'] = 0;
            $this->session->set_userdata('keyword', $data['keyword']);
            $this->session->set_userdata('keyword');
        } else if ($this->input->post('aktif')) {
            if (!$this->input->post('tahunfilter')) {
                $data['keyword'] = $this->input->post('jurusanfilter');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else if (!$this->input->post('jurusanfilter')) {
                $data['keyword'] = $this->input->post('tahunfilter');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $data['keyword'] = $this->input->post('jurusanfilter');
                $data['keyword2'] = $this->input->post('tahunfilter');
                $this->session->set_userdata('keyword', $data['keyword']);
                $this->session->set_userdata('keyword2', $data['keyword2']);
            }
        } else {
            if (!$this->session->userdata('keyword2')) {
                $data['keyword'] = $this->session->userdata('keyword');
            } else {
                $data['keyword'] = $this->session->userdata('keyword');
                $data['keyword2'] = $this->session->userdata('keyword2');
            }
        }
        if ($this->input->post('jurusanfilter') || $this->input->post('tahunfilter')) {
            if (!$this->input->post('tahunfilter')) {
                $this->db->where('jurusan', $data['keyword']);
                $this->db->from('alumni');
            } else if (!$this->input->post('jurusanfilter')) {
                $this->db->where('tahun_lulus', $data['keyword']);
                $this->db->from('alumni');
            } else {
                $this->db->where('jurusan', $data['keyword']);
                $this->db->where('tahun_lulus', $data['keyword2']);
                $this->db->from('alumni');
            }
        } else {
            $this->db->like('keg_set_lulus', $data['keyword']);
            $this->db->or_like('nama_alumni', $data['keyword']);
            $this->db->or_like('jenis_kelamin', $data['keyword']);
            $this->db->or_like('alamat', $data['keyword']);
            $this->db->or_like('jurusan', $data['keyword']);
            $this->db->or_like('tahun_lulus', $data['keyword']);
            $this->db->or_like('no_telp', $data['keyword']);
            $this->db->or_like('sosmed', $data['keyword']);
            $this->db->or_like('nama_industry', $data['keyword']);
            $this->db->or_like('rating_smksa', $data['keyword']);
            $this->db->or_like('saran_smksa', $data['keyword']);
            $this->db->from('alumni');
        }
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['alumni'] = $this->Tablemodel->getTable($config['per_page'], $data['start'], $data['keyword'], $data['keyword2']);
        $data['total_rows'] = $config['total_rows'];
        if ($data['total_rows'] < $config['per_page']) {
            $data['per_page'] = $config['total_rows'];
        } else {
            $data['per_page'] = $config['per_page'];
        }

        $data['title'] = 'Tabel Alumni';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/table', $data);
        $this->load->view('templates/footer');
    }

    public function tambahL()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['title'] = 'Tambah Loker';
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi Loker', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/tambahL', $data);
            $this->load->view('templates/footer');
        } else {
            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/loker/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $newImage = 'default.jpg';
            }
            $data = [
                'judul' => $this->input->post('judul'),
                'isi_lowongan' => $this->input->post('isi'),
                'gambar' => $newImage,
                'tanggal_post' => date('y-m-d')
            ];
            $this->db->insert('loker', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('dashboard/loker');
        }
    }

    public function tambah()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['title'] = 'Tambah Data Alumni';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis kelamin', 'required');
        $this->form_validation->set_rules('telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('sosmed', 'Sosial Media');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $newImage = 'default.jpg';
            }
            $data = [
                'nama_alumni' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jeniskelamin'),
                'alamat' => $this->input->post('alamat'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_lulus' => $this->input->post('tahun'),
                'no_telp' => $this->input->post('telp'),
                'sosmed' => $this->input->post('sosmed'),
                'keg_set_lulus' => $this->input->post('status'),
                'nama_industry' => $this->input->post('industri'),
                'upload_foto' => $newImage,
                'rating_smksa' => $this->input->post('rating'),
                'saran_smksa' => $this->input->post('saran'),
                'tanggal_daftar' => date('y-m-d')
            ];
            $this->db->insert('alumni', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('dashboard/table');
        }
    }

    public function detail($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['alumni'] = $this->db->get_where('alumni', ['id' => $id])->row_array();
        $data['title'] = 'Detail ' . $data['alumni']['nama_alumni'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail', $data);
        $this->load->view('templates/footer');
    }

    public function detailL($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['loker'] = $this->db->get_where('loker', ['id' => $id])->row_array();
        $data['title'] = 'Detail Loker';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detailL', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['alumni'] = $this->db->get_where('alumni', ['id' => $id])->row_array();
        $data['title'] = 'Edit ' . $data['alumni']['nama_alumni'];
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'No Telp', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'nama_alumni' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jeniskelamin'),
                'alamat' => $this->input->post('alamat'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_lulus' => $this->input->post('tahun'),
                'no_telp' => $this->input->post('telp'),
                'sosmed' => $this->input->post('sosmed'),
                'keg_set_lulus' => $this->input->post('status'),
                'nama_industry' => $this->input->post('industri'),
                'upload_foto' => $newImage,
                'rating_smksa' => $this->input->post('rating'),
                'saran_smksa' => $this->input->post('saran'),
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('alumni');
            $this->session->set_flashdata('message', 'Diedit');
            redirect('dashboard/table');
        }
    }

    public function editL($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['loker'] = $this->db->get_where('loker', ['id' => $id])->row_array();
        $data['title'] = 'Edit Loker';
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi loker', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/editL', $data);
            $this->load->view('templates/footer');
        } else {
            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/loker/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'judul' => $this->input->post('judul'),
                'isi_lowongan' => $this->input->post('isi'),
                'gambar' => $newImage,
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('loker');
            $this->session->set_flashdata('message', 'Diedit');
            redirect('dashboard/loker');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('alumni');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/table');
    }

    public function hapusL($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('loker');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/loker');
    }

    public function loker()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('admin', ['email' => $email])->row_array();
        $data['loker'] = $this->db->get('loker')->result_array();
        $data['title'] = 'Info Loker';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/loker', $data);
        $this->load->view('templates/footer');
    }
}
