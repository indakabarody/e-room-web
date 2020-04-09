<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pinjam extends CI_Controller {
 
        function __construct(){
                        parent::__construct();          
                        $this->load->model('m_peminjaman');
                        $this->load->helper('url');
                }

        public function index(){       
                $data['query'] = $this->m_peminjaman->tampil_data();

                $this->load->view('header', $data);
                $this->load->view('peminjaman', $data);
                $this->load->view('footer', $data);
         }
        
       
        

        public function hapus(){
                $idPeminjaman = $this->input->post('idPeminjaman1');
                $this->m_peminjaman->hapus_data($idPeminjaman);
        }

        public function accept()
        {
            $idPeminjaman = $this->uri->segment(3);
            $this->m_peminjaman->accept($idPeminjaman);
        }

        public function reject()
        {
            $idPeminjaman = $this->uri->segment(3);
            $this->m_peminjaman->reject($idPeminjaman);
        }
}


