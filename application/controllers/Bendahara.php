<?php

class Bendahara extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('bendahara_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->bendahara_model->list_bendahara();
        $this->load->view("dashboard/data_bendahara/list", $data);
    }

    public function add(){
        $this->load->view("dashboard/data_bendahara/add");
    }

    public function edit($id = null){
        if(!$id) redirect(base_url());
        $data["bendahara"] = $this->bendahara_model->GetBendahara($id);
        $this->load->view("dashboard/data_bendahara/edit", $data);
    }

    public function save_add(){
        $this->bendahara_model->save_add();
    }

    public function save_edit(){
        $this->bendahara_model->save_edit();
    }
}
