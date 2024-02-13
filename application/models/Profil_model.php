<?php

class Profil_model extends CI_Model
{
    function data_saya()
    {
        if($this->session->userdata('SES-ROLE') == 'admin'){
        $this->db->select("*");
        $this->db->from("admin");
        $this->db->where("nama_admin", $this->session->userdata('SES-SPP'));
        }else{
        $this->db->select("*, id_bendahara as id_admin, nama_bendahara as nama_admin");
        $this->db->from("bendahara");
        $this->db->where("nama_bendahara", $this->session->userdata('SES-SPP'));
        }
        return $this->db->get()->row();
    }

    public function save_saya()
    {
        $post = $this->input->post();
        if ($post["password"] != null) {
            $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        }
        if($this->session->userdata('SES-ROLE') == 'admin'){
        if ($this->db->update("admin", $this, array('nama_admin' => $this->session->userdata('SES-SPP')))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("profil"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("profil"));
        }
    }else{
        if ($this->db->update("bendahara", $this, array('nama_bendahara' => $this->session->userdata('SES-SPP')))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("profil"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("profil"));
        } 
    }
    }
}
