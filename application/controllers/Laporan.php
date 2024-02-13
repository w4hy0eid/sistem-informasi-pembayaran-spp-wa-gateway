<?php

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('siswa_model');
        $this->load->model('invoice_model');
        $this->load->model('laporan_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->laporan_model->list_laporan();
        $this->load->view("dashboard/data_laporan/list", $data);
    }

    public function print_laporan()
    {
        $this->load->library('pdf');
        $data["laporan"] = $this->laporan_model->laporan();
        $name = $this->input->post("tanggal_awal") . "-" . $this->input->post("tanggal_akhir") . "-" . $this->input->post("dokter");
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml(ob_get_clean());
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Print-Laporan-$name.pdf";
        $this->pdf->load_view('dashboard/data_laporan/print_laporan_pdf', $data);
    }

}
