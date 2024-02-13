<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('dashboard_model');
		if ($this->login_model->isNotLogin()) {
			redirect(site_url("login"));
		}
	}

	public function index()
	{
		$data["Total_Invoice"] = $this->dashboard_model->Total_Invoice();
		$data["Total_Siswa"] = $this->dashboard_model->Total_Siswa();
		$this->load->view("dashboard/dashboard", $data);
	}
}
