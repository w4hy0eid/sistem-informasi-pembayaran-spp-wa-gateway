<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('siswa_model');
        $this->load->model('invoice_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->siswa_model->list_siswa();
        $this->load->view("dashboard/data_siswa/list", $data);
    }

    public function add()
    {
        $this->load->view("dashboard/data_siswa/add");
    }

    public function edit($nis = null)
    {
        if (!$nis) {
            redirect(site_url());
        }
        $data["edit"] = $this->invoice_model->GetSiswaByNIS($nis);
        $this->load->view("dashboard/data_siswa/edit", $data);
    }

    public function save()
    {
        $this->siswa_model->save();
    }

    public function save_edit()
    {
        $this->siswa_model->save_edit();
    }

    public function hapus()
    {
        $this->siswa_model->hapus();
    }
}
