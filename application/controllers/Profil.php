<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('profil_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["saya"] = $this->profil_model->data_saya();
        $this->load->view("dashboard/saya", $data);
    }

    public function save_saya()
    {
        $this->profil_model->save_saya();
    }
}
