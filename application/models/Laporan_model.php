<?php

class Laporan_model extends CI_Model
{

    public function list_laporan()
    {
        $this->db->select("*");
        $this->db->from("data_laporan");
        return $this->db->get()->result();
    }

    public function laporan()
    {
        $this->db->select("*");
        $this->db->from("data_laporan");
        $minvalue = $this->input->post("tanggal_awal");
        $max_value = $this->input->post("tanggal_akhir");
        $this->db->where("tanggal BETWEEN '$minvalue' AND '$max_value'");
        return $this->db->get()->result();
    }

}
