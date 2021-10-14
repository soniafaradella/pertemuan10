<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controllername extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    // List all your items
    public function index()
    {
        $data = [
            'judul' => 'Katalog Buku',
            'buku' => $this->ModelBuku->getBuku()->result(),
        ];

        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            
            $data['user'] = $user['nama'];

            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku', $data);

            $this->load->view('templates/templates-user/footer', $data);
            
            
        } else {
            $data['user'] = 'Pengunjung';
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            
            $this->load->view('templates/templates-user/footer', $data);
            
        }
    }

    // Add a new item
    public function add()
    {

    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Controllername.php */

