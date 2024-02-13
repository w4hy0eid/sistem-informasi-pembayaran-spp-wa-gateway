<?php


class Invoice_model extends CI_Model
{

    public function GetSiswaByNIS($nis)
    {
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->join('orang_tua', 'orang_tua.id_ortu = siswa.id_ortu');
        $this->db->where("siswa.id_siswa", $nis);
        return $this->db->get()->row();
    }

    public function list_invoice()
    {
        $this->db->select("*");
        $this->db->from("data_pembayaran");
        return $this->db->get()->result();
    }

    public function GetInvoiceByInvoice($invoice)
    {
        $this->db->select("*");
        $this->db->from("data_pembayaran");
        $this->db->join('siswa', 'siswa.id_siswa = data_pembayaran.id_siswa');
        $this->db->join('orang_tua', 'orang_tua.id_ortu = siswa.id_ortu');
        $this->db->where("data_pembayaran.no_invoice", $invoice);
        return $this->db->get()->row();
    }

    public function save_one()
    {
        $post = $this->input->post();
        $get_data = $this->GetSiswaByNIS($post["nis_siswa"]);
        $data_pembayaran = [
            'no_invoice' => date("ymds") . $post["nis_siswa"],
            'id_siswa' => $post["nis_siswa"],
            'nama_pembayaran' => $post["nama_pembayaran"],
            'jumlah_bayar' => $this->unix($post["total_pembayaran"]),
            'jatuh_tempo' => $post["jatuh_tempo"],
            'keterangan' => $post["keterangan"],
            'status' => 'Belum Bayar',
            'tanggal_buat' => date("Y-m-d")
        ];

        $data_laporan = [
            'id_laporan' => null,
            'no_invoice' => date("ymds") . $post["nis_siswa"],
            'id_siswa' => $get_data->id_siswa,
            'id_ortu' => $get_data->id_ortu,
            'nama_siswa' => $get_data->nama_siswa,
            'no_tlp' => $get_data->no_hp,
            'tanggal' => date("Y-m-d")
        ];

        $text = [
            'api_key' => API_KEY,
            'sender' => NO_WA,
            'number' =>  $this->GetSiswaByNIS($post["nis_siswa"])->no_hp,
            'message' => "========" . strtoupper($post["nama_pembayaran"]) . "========\nNIS : " . $post["nis_siswa"] . "\nNama Siswa : " . $this->GetSiswaByNIS($post["nis_siswa"])->nama_siswa . "\nNama Orang Tua : " . $this->GetSiswaByNIS($post["nis_siswa"])->nama_ortu . "\nJatuh Tempo : " . $post["jatuh_tempo"] . "\nTransfer Ke : 3780454376 a/n Fikri Maulana (BCA)\nTotal : Rp. " . number_format($this->unix($post["total_pembayaran"]), 0, ",", ".") . "\nKeterangan : " . $post["keterangan"] . "",
            'footer' => "Harap melakukan pembayaran sebelum jatuh tempo, Jika sudah melakukan pembayaran klik tombol Konfirmasi Pembayaran.",
            'button1' => "Konfirmasi Pembayaran - " . date("ymds") . $post["nis_siswa"] . "",
        ];
        if ($this->db->insert("data_pembayaran", $data_pembayaran) && $this->db->insert("data_laporan", $data_laporan)) {
            $this->whatsapp_api($text);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Data Invoice Siswa Berhasil disimpan!</div>');
            redirect(site_url("invoice"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Data Invoice Siswa Gagal disimpan!</div>');
            redirect(site_url("invoice"));
        }
    }


    public function save_mass()
    {
        $post = $this->input->post();
        $get_data = $this->GetSiswaByNIS($post["nis_siswa"]);
        $this->no_invoice = null;
        $this->no_invoice = date("ymds") . $post["nis_siswa"];
        $this->nis_siswa = $post["nis_siswa"];
        $this->nama_pembayaran = $post["nama_pembayaran"];
        $this->jumlah_bayar = $this->unix($post["total_pembayaran"]);
        $this->jatuh_tempo = $post["jatuh_tempo"];
        $this->keterangan = $post["keterangan"];
        $this->status = "Belum Bayar";
        $this->tanggal_buat = date("Y-m-d");
        $text = [
            'api_key' => API_KEY,
            'sender' => NO_WA,
            'number' =>  $this->GetSiswaByNIS($post["nis_siswa"])->no_hp,
            'message' => "========" . strtoupper($post["nama_pembayaran"]) . "========\nNIS : " . $post["nis_siswa"] . "\nNama Siswa : " . $this->GetSiswaByNIS($post["nis_siswa"])->nama_siswa . "\nNama Orang Tua : " . $this->GetSiswaByNIS($post["nis_siswa"])->nama_ortu . "\nJatuh Tempo : " . $post["jatuh_tempo"] . "\nTransfer Ke : 3780454376 a/n Fikri Maulana (BCA)\nTotal : Rp. " . number_format($this->unix($post["total_pembayaran"]), 0, ",", ".") . "\nKeterangan : " . $post["keterangan"] . "",
            'footer' => "Harap melakukan pembayaran sebelum jatuh tempo, Jika sudah melakukan pembayaran klik tombol Konfirmasi Pembayaran.",
            'button1' => "Konfirmasi Pembayaran - " . date("ymds") . $post["nis_siswa"] . "",
        ];
        if ($this->db->insert("data_pembayaran", $this)) {
            $this->whatsapp_api($text);
            $output = array(
                "error_code" => 200,
                "message" => "Invoice Berhasil dikirim ke " . $this->GetSiswaByNIS($post["nis_siswa"])->nama_siswa,
                "type" => "success",
            );
        } else {
            $output = array(
                "error_code" => 500,
                "nama_warga" =>  "Invoice Gagal dikirim ke " . $this->GetSiswaByNIS($post["nis_siswa"])->nama_siswa,
                "type" => "error",
            );
        }
        echo json_encode($output);
    }

    public function konfirmasi($invoice)
    {
        $post = $this->input->post();
        $this->status = "Konfirmasi";
        if ($this->db->update("data_pembayaran", $this, array('no_invoice' => $invoice))) {
            // echo 200;
        } else {
            // echo 500;
        }
    }


    public function save_edit()
    {
        $post = $this->input->post();
        $this->status = $post["status"];
        if ($this->db->update("data_pembayaran", $this, array('no_invoice' => $post["no_invoice"]))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("invoice/edit/") . $post['no_invoice']);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("invoice/edit/") . $post['no_invoice']);
        }
    }
    
     public function hapus()
        {
            $no_invoice = $this->input->post("no_invoice");
            if ($this->db->delete("data_pembayaran", array("no_invoice" => $no_invoice))) {
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

    public function whatsapp_api($text)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://wa.kofidev.my.id/send-button",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($text),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        curl_exec($curl);

        curl_close($curl);
    }

    public function unix($nominal)
    {
        $sub = substr($nominal, -3);
        $sub2 = substr($nominal, -2);
        $sub3 = substr($nominal, -1);

        $total = random_string('numeric', 3);
        $total2 = random_string('numeric', 2);
        $total3 = random_string('numeric', 1);

        if ($sub == 0) {
            $hasil = $nominal + $total;
        } else if ($sub2 == 0) {
            $hasil = $nominal + $total2;
        } else if ($sub3 == 0) {
            $hasil = $nominal + $total3;
        } else {
            $hasil = $nominal;
        }
        return $hasil;
    }
    
    
}
