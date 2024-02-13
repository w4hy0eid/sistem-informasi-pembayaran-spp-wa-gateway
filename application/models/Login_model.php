<?php
// error_reporting(0);
class Login_model extends CI_Model
{
    private $_admin = "admin";
    private $_bendahara = "bendahara";

    public function login()
    {
        $post = $this->input->post();
        $admin = $this->db->get_where($this->_admin, array('nama_admin' => $post["username"]))->row();
        $bendahara = $this->db->get_where($this->_bendahara, array('nama_bendahara' => $post["username"]))->row();
        if ($admin) {
            $isPasswordTrue = password_verify($post["password"], $admin->password);
            $this->session->set_userdata(['login' => "user"]);
        } elseif ($bendahara) {
            $isPasswordTrue_Bendahara = password_verify($post["password"], $bendahara->password);
            $this->session->set_userdata(['login' => "bendahara"]);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-white">User tidak terdaftar !</div>');
            redirect(site_url("login"));
        }
        if ($admin != null && $isPasswordTrue == true) {
            $username = $post["username"];
            $this->session->set_userdata(['SES-SPP' => $username]);
            $this->session->set_userdata(['SES-ROLE' => 'admin']);
            redirect(site_url("dashboard"));
        } elseif ($bendahara != null &&  $isPasswordTrue_Bendahara == true) {
            $username = $post["username"];
            $this->session->set_userdata(['SES-SPP' => $username]);
            $this->session->set_userdata(['SES-ROLE' => 'bendahara']);
            redirect(site_url("dashboard"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-white">Password Salah !</div>');
            redirect(site_url("login"));
        }
    }


    public function isNotLogin()
    {
        return $this->session->userdata('SES-SPP') == null;
    }
}
