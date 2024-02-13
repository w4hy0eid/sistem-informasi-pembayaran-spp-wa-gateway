<?php

class Siswa_model extends CI_Model
{

    public function list_siswa()
    {
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->join('orang_tua', 'orang_tua.id_ortu = siswa.id_ortu');
        return $this->db->get()->result();
    }

    public function GetSiswa()
    {
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->join('orang_tua', 'orang_tua.id_ortu = siswa.id_ortu');
        return $this->db->get()->result();
    }


    public function save()
    {
        $post = $this->input->post();

        // save data siswa
        $siswa = [
            'id_siswa' => $post["nis_siswa"],
            'id_ortu' => $post["nis_siswa"],
            'nama_siswa' => $post["nama_siswa"],
            'kelas_siswa' => $post["kelas_siswa"],
            'alamat_siswa' => $post["alamat_siswa"],
            'ttl_siswa' => $post["ttl_siswa"]
        ];

        // $this->id_siswa = null;
        // $this->id_ortu = $post["nis_siswa"];
        // $this->nis_siswa = $post["nis_siswa"];
        // $this->nama_siswa = $post["nama_siswa"];
        // $this->kelas_siswa = $post["kelas_siswa"];
        // $this->alamat_siswa = $post["alamat_siswa"];
        // $this->ttl_siswa = $post["ttl_siswa"];
        // $this->jk_siswa = $post["jk_siswa"];
        // $this->agama_siswa = $post["agama_siswa"];

        //save data orang tua
        $ortu = [
            'id_ortu' => $post["nis_siswa"],
            'nama_ortu' => $post["nama_ortu"],
            'alamat_ortu' => $post["nis_siswa"],
            'jk_ortu' => $post["jk_ortu"],
            'agama_ortu' => $post["agama_ortu"],
            'no_hp' => $post["no_hp"]
        ];

        if ($this->db->insert("siswa", $siswa) && $this->db->insert("orang_tua", $ortu)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Data Siswa Berhasil disimpan!</div>');
            redirect(site_url("siswa"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Data Siswa Gagal disimpan!</div>');
            redirect(site_url("siswa"));
        }
    }

    public function save_edit()
    {
        $post = $this->input->post();

        // save data siswa
        $siswa = [
            'id_siswa' => $post["nis_siswa"],
            'id_ortu' => $post["nis_siswa"],
            'nama_siswa' => $post["nama_siswa"],
            'kelas_siswa' => $post["kelas_siswa"],
            'alamat_siswa' => $post["alamat_siswa"],
            'ttl_siswa' => $post["ttl_siswa"]
        ];

        //save data orang tua
        $ortu = array(
            'id_ortu' => $post["nis_siswa"],
            'nama_ortu' => $post["nama_ortu"],
            'alamat_ortu' => $post["alamat_ortu"],
            'jk_ortu' => $post["jk_ortu"],
            'agama_ortu' => $post["agama_ortu"],
            'no_hp' => $post["no_hp"]
        );


        if ($this->db->update("siswa", $siswa, array('id_siswa' => $post["id_siswa"])) && $this->db->update("orang_tua", $ortu, array('id_ortu' => $post["nis_lama"]))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Data Berhasil diubah!</div>');
            redirect(site_url("siswa"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Data Gagal diubah!</div>');
            redirect(site_url("siswa"));
        }
    }

    public function hapus()
    {
        $nis_siswa = $this->input->post("nis");
        if ($this->db->delete("siswa", array("nis_siswa" => $nis_siswa)) && $this->db->delete("orang_tua", array("id_ortu" => $nis_siswa))) {
            $output = array(
                "error_code" => 0,
                "message" => "success",
            );
        } else {
            $output = array(
                "error_code" => 2,
                "message" => "failed",
            );
        }
        echo json_encode($output);
    }
}
