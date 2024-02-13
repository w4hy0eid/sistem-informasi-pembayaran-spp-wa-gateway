<?php

class Konfirmasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("login_model");
        // $this->load->model("siswa_model");
        $this->load->model("invoice_model");
        // if ($this->login_model->isNotLogin()) {
        //     redirect(site_url("login"));
        // }
    }

    public function invoice($invoice = null)
    {
        if (!$invoice) {
            redirect(site_url());
        }
        $this->invoice_model->konfirmasi($invoice);
    }
    
    public function webhook()
    {
        header('content-type: application/json');
         $data = json_decode(file_get_contents('php://input'), true);
         file_put_contents('whatsapp.txt', '[' . date('Y-m-d H:i:s') . "]\n" . json_encode($data) . "\n\n", FILE_APPEND);                                               
         $message = strtolower($data['message']);
         $from = strtolower($data['from']);
         $respon = false;
         $konfir = explode(" - ", $data["message"])[0];
         $no_invoice = explode(" - ", $data["message"])[1];
 
             
        if ($konfir === "konfirmasi pembayaran") {
            $this->invoice_model->konfirmasi($no_invoice);
            $respon = [ "text" => "Terimakasih telah melakukan pembayaran, kami akan segera cek dan proses.",];
        } 
        
         echo json_encode($respon);
        
    }
    
        

}
