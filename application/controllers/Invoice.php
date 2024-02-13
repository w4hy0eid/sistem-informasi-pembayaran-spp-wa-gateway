<?php

class Invoice extends CI_Controller
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
        $data["list"] = $this->invoice_model->list_invoice();
        $this->load->view("dashboard/data_invoice/list", $data);
    }

    public function add_one()
    {
        $data["list"] = $this->siswa_model->list_siswa();
        $this->load->view("dashboard/data_invoice/add_one", $data);
    }

    public function add_mass()
    {
        $data["list"] = $this->siswa_model->list_siswa();
        $this->load->view("dashboard/data_invoice/add_mass", $data);
    }

    public function edit($invoice = null)
    {
        if (!$invoice) {
            redirect(site_url());
        }
        $data["edit"] = $this->invoice_model->GetInvoiceByInvoice($invoice);
        $this->load->view("dashboard/data_invoice/edit", $data);
    }

    public function save_one()
    {
        $this->invoice_model->save_one();
    }

    public function save_mass()
    {
        $this->invoice_model->save_mass();
    }

    public function save_edit()
    {
        $this->invoice_model->save_edit();
    }
    
     public function hapus()
    {
        $this->invoice_model->hapus();
    }
}
