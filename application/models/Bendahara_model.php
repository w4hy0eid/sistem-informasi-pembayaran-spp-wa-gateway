<?php

class Bendahara_model extends CI_Model
{

    public function list_bendahara()
    {
        $this->db->select("*");
        $this->db->from("bendahara");
        return $this->db->get()->result();
    }

    public function GetBendahara($id){
        $this->db->select("*");
        $this->db->from("bendahara");
        $this->db->where("id_bendahara", $id);
        return $this->db->get()->row();
    }

    public function save_add(){
       $post = $this->input->post();
       $data = [
        'id_bendahara' => null,
        'nama_bendahara' => $post["username"],
        'password' => password_hash($post["password"], PASSWORD_DEFAULT)
       ];
       if ($this->db->insert("bendahara", $data)) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Data Bendahara Berhasil disimpan!</div>');
        redirect(site_url("bendahara"));
    } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Data Bendahara Gagal disimpan!</div>');
        redirect(site_url("bendahara"));
    }
    }

    public function save_edit()
    {
        $post = $this->input->post();
        if ($post["password"] != null) {
            $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        }
        $this->nama_bendahara = $post["username"];
        if ($this->db->update("bendahara", $this, array('nama_bendahara' => $post["username"]))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("bendahara"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("bendahara"));
        }
    }

}
