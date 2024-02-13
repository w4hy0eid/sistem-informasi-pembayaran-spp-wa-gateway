<?php

class Dashboard_model extends CI_Model
{
    public function Total_Invoice()
    {
        $this->db->select("*");
        $this->db->select_sum('data_pembayaran.jumlah_bayar', 'grand_total_invoice');
        $this->db->from("data_pembayaran");
        $this->db->where('data_pembayaran.status', "Sudah Bayar");
        return $this->db->get()->row();
    }

    public function Total_Siswa()
    {
        $this->db->select("*");
        $this->db->from("siswa");
        return $this->db->get()->num_rows();
    }
}
