<?php

class Tablemodel extends CI_model
{
    public function getTable($limit, $start, $keyword, $keyword2)
    {
        if (!$keyword2) {
            $this->db->where('jurusan', $keyword);
            $this->db->or_where('tahun_lulus', $keyword);
            $this->db->or_like('keg_set_lulus', $keyword);
            $this->db->or_like('nama_alumni', $keyword);
            $this->db->or_like('jenis_kelamin', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('no_telp', $keyword);
            $this->db->or_like('sosmed', $keyword);
            $this->db->or_like('nama_industry', $keyword);
            $this->db->or_like('rating_smksa', $keyword);
            $this->db->or_like('saran_smksa', $keyword);
            return $this->db->get('alumni', $limit, $start)->result_array();
        } else if (!$keyword) {
            $this->db->where('tahun_lulus', $keyword2);
            return $this->db->get('alumni', $limit, $start)->result_array();
        } else {
            $this->db->where('jurusan', $keyword);
            $this->db->where('tahun_lulus', $keyword2);
            return $this->db->get('alumni', $limit, $start)->result_array();
        }
    }
}
