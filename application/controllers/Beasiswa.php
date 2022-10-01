<?php

class Beasiswa extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelBeasiswa");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataBeasiswa = $this->ModelBeasiswa->getAll();
        $data = array(
            "beasiswa" => $dataBeasiswa
        ); 
        $this->load->view('header');
        $this->load->view('content/beasiswa/v_list_beasiswa', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/beasiswa/v_add_beasiswa");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $data = array( 
            "nama" => $this->input->post("nama"), 
            "deskripsi" => $this->input->post("deskripsi")
           
        ); 
        $id = $this->ModelBeasiswa->insertGetId($data); 
        redirect('beasiswa'); 
    } 

    public function ubah($id) 
    { 
        $beasiswa = $this->ModelBeasiswa->getByPrimaryKey($id); 
        $data = array( 
            "beasiswa" => $beasiswa, 
        ); 
        $this->load->view('header');
        $this->load->view('content/beasiswa/v_update_beasiswa',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_beasiswa'); 
        $data = array( 
            "nama" => $this->input->post('nama'), 
            "deskripsi" => $this->input->post('deskripsi')
        ); 
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelBeasiswa->update($id, $data); 
        redirect('beasiswa'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_beasiswa'); 
        $this->ModelBeasiswa->delete($id); 
        redirect('beasiswa'); 
    } 
}
