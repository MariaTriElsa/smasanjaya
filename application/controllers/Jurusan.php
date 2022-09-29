<?php

class Jurusan extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelJurusan");
		$this->check_login();
		if ($this->session->userdata('id_role') != "1") {
			redirect('', 'refresh');
		}
	}

	public function index()
    {
        $dataJurusan = $this->ModelJurusan->getAll();
        $data = array(
            "jurusan" => $dataJurusan
        ); 
        $this->load->view('header');
        $this->load->view('content/jurusan/v_list_jurusan', $data);
        $this->load->view('footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah(){
        $this->load->view('header');
        $this->load->view("content/jurusan/v_add_jurusan");
        $this->load->view('footer');
    }
    
    public function insert() 
    { 
        $data = array( 
            "nama_jurusan" => $this->input->post("nama_jurusan"), 
            "deskripsi_jurusan" => $this->input->post("deskripsi_jurusan"), 
            "keunggulan_jurusan" => $this->input->post("keunggulan_jurusan") 
        ); 
        $id = $this->ModelJurusan->insertGetId($data); 
        redirect('jurusan'); 
    } 

    public function ubah($id) 
    { 
        $jurusan= $this->ModelJurusan->getByPrimaryKey($id); 
        $data = array( 
            "jurusan" => $jurusan, 
        ); 
        $this->load->view('header');
        $this->load->view('content/jurusan/v_update_jurusan',$data); 
        $this->load->view('footer');
    } 
 
    public function update() 
    { 
        $id = $this->input->post('id_jurusan'); 
        $data = array( 
            "nama_jurusan" => $this->input->post('nama_jurusan'), 
            "deskripsi_jurusan" => $this->input->post('deskripsi_jurusan'), 
            "keunggulan_jurusan" => $this->input->post('keunggulan_jurusan') 
        ); 
        echo var_dump($data); 
        echo var_dump($id); 
        $this->ModelJurusan->update($id, $data); 
        redirect('jurusan'); 
    } 
 
    public function delete() 
    { 
        $id = $this->input->post('id_jurusan'); 
        $this->ModelJurusan->delete($id); 
        redirect('jurusan'); 
    } 
}
